<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\PharamcyEmployee;
use App\Models\Client;
use App\Models\Bill;
use App\Models\Billinfo;
use App\Models\Info;
use Illuminate\Support\Facades\Auth;
use App\Models\PharmacyProduct;
use App\Models\Product;
use Illuminate\Support\Arr;
use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\Facade;

class ClientController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'client_name' => 'required|string',
            'email' => 'required|unique:clients,email',
            'password' => 'required',

        ]);

        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }

        $client = new Client;
        $client->client_name = $request->client_name;
        $client->email = $request->email;
        $client->country = $request->country;
        $client->city = $request->city;
        $client->neighborhood = $request->neighborhood;
        $client->password = Hash::make($request->password);
        $client->save();

        if (!$client) {
            // return error
            
            return response()->json([
                'data' => null,
                'message' => 'Error Register new user',
            ], 400);
        }
        //   return response()->json(["1"]);

        $token = auth('client-api')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/')->with('success', 'Registration successful');
        return response()->json([
            'pharmaciset' => $client,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    public function login(Request $request)
    {
    // Validate request data
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Invalid input',
            'errors' => $validator->errors()
        ], 400);
    }

    $client = Client::where('email', $request->email)->first();

    if (!$client || !Hash::check($request->password, $client->password)) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    $token = Auth::guard('client-api')->login($client);

    return response()->json([
        'message' => 'Logged in successfully',
        'access_token' => $token,
        'token_type' => 'Bearer',
        'client' => $client
    ], 200);
    }

    function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(["message" => "loged out successfully"], 200);
    }
    /**-------------------------------------------------- */

    public function get_pharmacy()
    {
        $pharmacists = Admin::all();
        return response()->json([
            'message' => 'this is all pharmacists',
            'data' => $pharmacists
        ]);
    }


    public function get_pharmacy_product($admin_id)
    {
        $pharmacy_product = PharmacyProduct::where('pharmacy_id', $admin_id)
            ->with('product')
            ->get()
            ->makeHidden(['total_amount', 'profit_percentage', 'profit']);

        return response()->json([$pharmacy_product]);
    }

    public function get_pharmacies_by_location(Request $request)
    {
        if ($request->country && $request->city && $request->neighborhood) {
            $pharmacies = Admin::where('country', $request->country)
                ->where('city', $request->city)
                ->where('neighborhood', $request->neighborhood)
                ->get();
            return response()->json([
                $pharmacies->makeHidden(['networh', 'total_medicine', 'profit'])
            ]);
        } else if ($request->country && $request->city) {
            $pharmacies = Admin::where('country', $request->country)
                ->where('city', $request->city)
                ->get();
            return response()->json([
                $pharmacies->makeHidden(['networh', 'total_medicine', 'profit'])
            ]);
        } else if ($request->country) {
            $pharmacies = Admin::where('country', $request->country)->get();
            return response()->json([
                $pharmacies->makeHidden(['networh', 'total_medicine', 'profit'])
            ]);
        }
    }

    public function sorted_loctation_pharmacy() // defualt location where location is client location
    {
        $client_id = auth('client-api')->user()->id;
        $client = Client::where('id', $client_id)->first();
        if ($client->location_switch = true) {
            $pharmacies = Admin::where('country', $client->country)             // all
                ->where('city', $client->city)
                ->where('neighborhood', $client->neighborhood)
                ->get();
            $pharmacies2 = Admin::where('country', $client->country)           // country , city
                ->where('city', $client->city)
                ->where('neighborhood', '!=', $client->neighborhood)
                ->get();
            $pharmacies3 = Admin::where('country', $client->country)            // country
                ->where('city', '!=', $client->city)
                ->get();
            $pharmacies4 = Admin::where('country', '!=', $client->country)         //else
                ->where('city', '!=', $client->city)
                ->where('neighborhood', '!=', $client->neighborhood)
                ->get();
            // $filteredData = $pharmacies->map(function ($pharmacy) {        //
            //     return $pharmacy->makeHidden(['networth', 'total_medicine', 'profit']);
            // });
            return response()->json([
                "message" => "successfully restord",
                "identical in all"          => $pharmacies->makeHidden(['networth', 'total_medicine', 'profit']),
                "identical in country,city" => $pharmacies2->makeHidden(['networth', 'total_medicine', 'profit']),
                "identical in country"      => $pharmacies3->makeHidden(['networth', 'total_medicine', 'profit']),
                "else"                      => $pharmacies4->makeHidden(['networth', 'total_medicine', 'profit']),
            ]);
        } else if ($client->location_switch = false) {
            return response()->json(["location is not set"]);
        }
    }

    public function add_favorite(Request $request, $product_id)
    {
        $client_id = auth('client-api')->user()->id;
        if (!$favorite = FavoriteProduct::where('product_id', $product_id)->where('client_id', $client_id)->first()) {
            $favorite = new FavoriteProduct;
            $favorite->client_id  = $client_id;
            $favorite->product_id = $product_id;
            if (isset($request->timer)) {
                $favorite->timer = $request->timer;
                $favorite->timer2 = $favorite->timer;
            }
            if(isset($request->timer_condition)){
                $favorite->timer_condition = $request->timer_condition;
            }
            $favorite->save();
            return response()->json(["message" => "product added successfully"]);
        } else {
            return response()->json(["message" => "product is already added !"]);
        }
    }

    public function get_favorite()
    {
        $client_id = auth('client-api')->user()->id;
        $favorite = FavoriteProduct::where('client_id', $client_id)->with('product')->get();
        return response()->json([$favorite]);
    }
    
    public function edit_favorite(Request $request, $product_id)
    {
        $client_id = auth('client-api')->user()->id;

        $favorite = FavoriteProduct::where('product_id', $product_id)
            ->where('client_id', $client_id)
            ->first();
        if (isset($request->timer)) {
            $favorite->timer = $request->timer;
        }
        if(isset($request->timer_condition)){
            $favorite->timer_condition = $request->timer_condition;
        }
        $favorite->save();
        return response()->json(["message"=>"edited successfully"]);
    }

    public function delete_favorite($product_id)
    {
        $client_id = auth('client-api')->user()->id;
        $favorite = FavoriteProduct::where('product_id', $product_id)
            ->where('client_id', $client_id)
            ->delete();
            return response()->json(["meesage"=>"deleted successfully"]);
        }
}
