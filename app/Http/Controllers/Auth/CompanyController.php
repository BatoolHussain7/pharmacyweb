<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CompanyController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location' => 'required|string',
            'company_name' => 'required|string',
            'email' => 'required|unique:companies,email',
            'password' => 'required',
        ]);

        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }
        $company = Company::create([
            'location' => $request->get('location'),
            'company_name' => $request->get('company_name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        if (!$company) {
            // return error
            return response()->json([
                'data' => null,
                'message' => 'Error Register new user',
            ]);
        }


        $token = auth('company-api')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }

        $company = Company::where('email', $request->email)->first();

        if (!$company || !Hash::check($request->password, $company->password)) {
            return response()->json([
                'data' => null,
                'message' => 'Credential error',
            ]);
        }
        $company = auth('company-api')->user();
        $token = auth('company-api')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response()->json([
            'message' => 'success',
            'company' => $company,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    
    public function add_product(Request $request)
    {
        if (!auth('company-api')) {
            return response()->json([
                "message" => "not authorized"
            ]);
        }
        else {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required|unique:products,product_name|string',
                'pharmacist_net' => 'required|integer',
                //'customer_net' => 'required|integer', customer is set by pharmacist net * 10 % 
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'error' => $errors
                ], 400);
            }

            $company_id = auth("company-api")->user()->id;
            $product = new Product;
            $product->company_id = $company_id;
            $product->product_name = $request->product_name;
            $product->pharmacist_net = $request->pharmacist_net;
            $product->customer_net = $request->pharmacist_net + ($request->pharmacist_net * 10 / 100);
            $product->expiration_date = $request->expiration_date;
            $product->production_date = $request->production_date;
            $product->description = $request->description;
            $product->save();
            if($request->img){
                $image_name = time() . '-' . $request->name . '.' . $request->img->extension();
                $request->img->move(public_path('images'), $image_name);
                $product->img = $image_name;
                $product->save();
            }

            if (!$product) {
                // return error
                return response()->json([
                    'data' => null,
                    'message' => 'Error Register new user',
                ]);
            }
            return response()->json([
                'product' => $product,
                'message' => 'added successfully'
            ]);
        }
    }

    public function get_company_products()
    {
        $company_id = auth("company-api")->user()->id;
        $products = Product::where("company_id", $company_id)->get();
        return response()->json([
            "message" => "company products restored successfully",
            "products" => $products
        ]);
    }
}
//---------------------------------------------REDEMEER->?----------------------------------------------------------------------