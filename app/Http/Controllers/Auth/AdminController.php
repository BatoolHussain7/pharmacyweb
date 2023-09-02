<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Bill;
use App\Models\Billinfo;
use App\Models\Company;
use App\Models\Info;
use Illuminate\Support\Facades\Auth;
use App\Models\PharmacyProduct;
use App\Models\Product;



class AdminController extends Controller
{


    // -------------------------------- auth -------------------------------------------
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pharmacist_name' => 'required|string',
            'email' => 'required|unique:admins,email',
            'password' => 'required',
            'img' => 'image|mimes:jpg,png|max:2048',
            'close_time' => 'date_format:H:i'
        ]);

        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }

        $admin = new Admin;
        $admin->pharmacist_name = $request->pharmacist_name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->get('password'));
        //location
        $admin->country = $request->country;
        $admin->city = $request->city;
        $admin->neighborhood = $request->neighborhood;
        $admin->phone = $request->phone;
        $admin->close_time = $request->close_time;
        $admin->save();

        if ($request->img) {
            $image_name = time() . '-' . $request->name . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $image_name);
            $admin->img = $image_name;
            $admin->save();
        }

        if (!$admin) {
            // return error
            return response()->json([
                'data' => null,
                'message' => 'Error Register new user',
            ], 400);
        }


        $token = auth('admin-api')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response()->json([
            'pharmaciset' => $admin,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
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

        $admin = Admin::where('email', $request->email)->first();
        //var_dump($admin);
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'data' => null,
                'message' => 'Credential error',
            ], 400);
        }
        $admin = auth('admin-api')->user();
        $token = auth('admin-api')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        $admin = Admin::where('email', $request->email)->first();
        return response()->json(
            [
                'message' => 'loged in successfully',
                'pharmaciset' => $admin,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ],
            200
        );
    }

    function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(["message" => "loged out successfully"], 200);
    }
    public function get_all_company_products()
    {
        if (auth('admin-api')) {

            $company = Company::all();
            return response()->json([
                "message" => $company->load('products')

            ]);
        } else {
            return response()->json(["message" => "not authorized"]);
        }
    }
    // ----------------------------- add functions -------------------------------------

    public function add_product_by_name(Request $request)
    {

        if (auth('admin-api')) {


            $product = Product::where('product_name', $request->name)->first();
            if ($product) {
                $pharmacy_product =  new PharmacyProduct;
                $pharmacy_product->product_id = $product->id;
                $pharmacy_product->pharmacy_id = auth('admin-api')->user()->id;
                $pharmacy_product->customer_net = $product->customer_net;
                $pharmacy_product->profit    = $product->pharmacist_net * (10 / 100);

                $pharmacy_product->save();

                return response()->json([
                    "message" => "product add",
                    "product_pharmacy" => $pharmacy_product,
                    "product information" => $product,
                ], 200);
            } else {
                return response()->json(["message" => "product not found"], 400);
            }
        } else
            return response()->json(["not authorized"]);
    }

    public function add_product_by_id($product_id)
    {
        if (auth('admin-api')) {
            $product = Product::where('id', $product_id)->first();
            if ($product) {
                $pharmacy_product =  new PharmacyProduct;
                $pharmacy_product->product_id = $product->id;
                $pharmacy_product->pharmacy_id = auth('admin-api')->user()->id;
                $pharmacy_product->customer_net = $product->customer_net;
                $pharmacy_product->profit    = $product->pharmacist_net * (10 / 100);
                $pharmacy_product->save();
                return response()->json([
                    "message" => "product add",
                    "product_pharmacy" => $pharmacy_product,
                    "product information" => $product,
                ]);
            } else {
                return response()->json(["message" => "product not found"]);
            }
        } else
            return response()->json(["not authorized"]);
    }

    public function smart_add_product(Request $request) // need api
    {
        if (auth('admin-api')) {
            $rules = [
                'product_ids' => 'array|required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'error' => $errors
                ], 400);
            }
            $product_ids = $request->product_ids;
            //$admin = Admin :: where(auth('admin-api')->user()->id)->first();
            foreach ($product_ids as $product_id) {
                $product = Product::where("id", $product_id)->first();
                $pharmacy_product = new PharmacyProduct;
                $pharmacy_product->product_id = $product->id;
                $pharmacy_product->pharmacy_id = auth('admin-api')->user()->id;
                $pharmacy_product->customer_net = $product->customer_net;
                $pharmacy_product->profit    = $product->pharmacist_net * (10 / 100);
                $pharmacy_product->save();
            }
            return response()->json([
                "messsage" => "product added successfully",
            ], 200);
        } else
            return response()->json(["message" => "not authorized"], 400);
    }

    public function add_info(Request $request, $product_id) 
    {
        if (!auth('admin-api')) {
            return response()->json(['message' => 'not authorized']);
        } else {
        
        $validator = validator::make(
            $request->all(),
            [
                'quantity' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            $error = $validator->errors();
            return response()->json([$error]);
        }
        $admin_id = auth('admin-api')->user()->id;
        $product = Product::where("id", $product_id)->first();

        $admin = Admin::where("id", $admin_id)->first();
        $admin->total_medicine = $admin->total_medicine +$request->quantity;
        $admin->save();
        $pharmacy_product = PharmacyProduct::where("product_id", $product_id)
            ->where("pharmacy_id", $admin_id)->first();
        if(!$pharmacy_product)
        return response()->json(["message"=>"product is not added"]);
        $pharmacy_product->total_amount = $pharmacy_product->total_amount +$request->quantity;
        $pharmacy_product->save();
        $info = new Info;
        $info->quantity = $request->quantity;
        $info->expiration_date = $product->expiration_date;
        $info->production_date = $product->production_date;
        $info->pharmacy_product_id = $pharmacy_product->id;
        $info->save();
        return response()->json([
            "message" => "added successfully", "info" => $info
        ]);
    }
    }
    public function smart_add_quantities(Request $request) // need api
    {
        $rules = [
            'product_ids' => 'array|required',
            'quantities' => 'array|required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }
        $quantities  = $request->quantities;
        $product_ids = $request->product_ids;
        $admin_id = auth('admin-api')->user()->id;
        $admin = Admin::where("id", $admin_id)->first();
        $i = 0;
        foreach ($product_ids as $product_id) {
            $product = Product::where("id", $product_id)->first();
            $pharmacy_product = PharmacyProduct::where("product_id", $product_id)
                ->where("pharmacy_id", $admin_id)->first();
            $info = new Info;
            $info->quantity = $quantities[$i];
            $info->expiration_date = $product->expiration_date;
            $info->production_date = $product->production_date;
            $info->pharmacy_product_id = $pharmacy_product->id;
            $info->save();
            $pharmacy_product->total_amount = $pharmacy_product->total_amount + $quantities[$i];
            $pharmacy_product->save();
            $admin->total_medicine = $admin->total_medicine + $quantities[$i];
            $admin->save();
            $i++;
        }
        return response()->json([
            "message" => "quantities added successfully"
        ], 200);
    }

    // --------------------------- delete functions --------------------------------------------
    public function delete_product_by_name(Request $request)
    {
        if (auth('admin-api')) {
            $admin_id = auth('admin-api')->user()->id;
            $product = Product::where('product_name', $request->name)->first();

            $pharmacy_product = PharmacyProduct::where("product_id", $product->id)
                ->where("pharmacy_id", $admin_id)->first();
            $pharmacy_product->delete();
            return response()->json([
                "message" => "product deleted successfully",
            ], 200);
        }
        return response()->json(["not authorized"]);
    }

    public function delete_product_by_id($product_id)
    {
        if (auth('admin-api')) {
            $admin_id = auth('admin-api')->user()->id;
            $product = Product::where('id', $product_id)->first();
            $pharmacy_product = PharmacyProduct::where("product_id", $product->id)
                ->where("pharmacy_id", $admin_id)->first();
            $pharmacy_product->delete();
            return response()->json([
                "message" => "product deleted successfully",
            ], 200);
        } else
            return response()->json(["message" => "not authorized"], 400);
    }

    public function delete_product_info() // check
    {
    }
    // ---------------------------- edit functions ----------------------------------------------
    public function edit_product_by_name(Request $request) // check
    {
        if (auth('admin-api')) {
            $rules = [
                'profit_percentege' => 'integer',
                'name' => 'required|string'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
            $product = Product::where('product_name', $request->name)->first();
            $pharmacy_product = PharmacyProduct::where("product_id", $product->id)
                ->where("pharmacy_id", auth('admin-api')->user()->id)->first();
            if (isset($request->profit_percentege)) {
                $pharmacy_product->profit_percentege = $request->profit_percentege;
            }
            $pharmacy_product->customer_net =  $product->pharmacist_net + ($product->pharmacist_net * $request->profit_percentage / 100);
            $pharmacy_product->profit = ($product->pharmacist_net * $request->profit_percentege / 100);
            $pharmacy_product->save();
            return response()->json([
                "message" => "edited successfully",
                "pharmacy_product" => $pharmacy_product,
            ], 200);
        } else {
            return response()->json([
                "message" => "not authorized",
            ], 400);
        }
    }

    public function edit_product_by_id(Request $request, $product_id)
    {
        if (!auth('admin-api')) {
            return response()->json(["message" => "not authorized"]);
        } else {
            $rules = [
                'profit_percentage' => 'integer',
                'customer_net' => 'integer'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
            $product = Product::where('id', $product_id)->first();
            $pharmacy_product = PharmacyProduct::where("product_id", $product->id)
                ->where("pharmacy_id", auth('admin-api')->user()->id)->first();
        }

        if (isset($request->profit_percentage)) {
            $pharmacy_product->profit_percentage = $request->profit_percentage;
            $pharmacy_product->customer_net =  $product->pharmacist_net + ($product->pharmacist_net * $request->profit_percentage / 100);
            $pharmacy_product->profit = ($product->pharmacist_net * $request->profit_percentage / 100);
            $pharmacy_product->save();
            return response()->json([
                "message" => "edited successfully",
                "pharmacy_product" => $pharmacy_product,
            ], 200);
        }
        if (isset($request->customer_net)) {
            $pharmacy_product->customer_net = $request->customer_net;
            $pharmacy_product->profit_percentage = (($request->customer_net - $product->pharmacist_net)  *  100) / $product->pharmacist_net;
            $pharmacy_product->profit = $pharmacy_product->profit_percentage / 100 * $product->pharmacist_net;
            $pharmacy_product->save();
            return response()->json([
                "message" => "edited successfully",
                "pharmacy_product" => $pharmacy_product,
            ], 200);
        }
    }


    public function edit_product_info() // check
    {
    }
    // ------------------------------ get functions ------------------------------------------------
    public function get_pharmacy_products()
    {
        if (auth('admin-api')) {
            $pharmacy_product = PharmacyProduct::where("pharmacy_id", auth('admin-api')->user()->id)
                ->with("product")->get();
            return response()->json([
                "message" => "data restored successfully",
                "products" => $pharmacy_product
            ], 200);
        } else return response()->json([
            "message" => "not authorized"
        ], 400);
    }

    public function get_product_information($product_id) // need api
    {
        if (!auth('admin-api')) {
            return response()->json([
                "message" => "not authorized"
            ], 400);
        } else {
            $admin_id = auth('admin-api')->user()->id;
            $pharmacy_product = PharmacyProduct::where("product_id", $product_id)
                ->where("pharmacy_id", $admin_id)->first();
            $info = Info::where("pharmacy_product_id", $pharmacy_product->id)->get();
            return response()->json([
                "message" => "information restored successfully",
                "information" => $info
            ], 200);
        }
    }

    public function get_price(Request $request)
    {
        $pharmacy_id = auth('admin-api')->user()->id;
        $product = Product::where('product_name', $request->name)->first();

        $product_pharmacy = PharmacyProduct::where('pharmacy_id', $pharmacy_id)
            ->where('product_id', $product->id)->first();
        if (!$product_pharmacy) {
            $product = Product::where("id", $product_pharmacy->id)->first();
            return response()->json([
                "message" => "product not found",
                "product" => $product->name
            ], 400);
        } else {
            return response()->json([
                'price' => $product_pharmacy->customer_net,
                'product_id' => $product_pharmacy->product_id
            ], 200);
        }
    }
    // ---------------------------- bill functions --------------------------------------
    public function create_bill(Request $request) //check
    {
        $rules = [
            'product_id' => 'json|required',
            'quantity' => 'json|required'
        ];
        $validator = Validator::make(
            $request->all(),
            $rules
        );
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }

        $pharmacy_id = auth('admin-api')->user()->id;
        $admin = Admin::where("id", $pharmacy_id)->first();
        $ids = json_decode($request->product_id);
        $quantities = json_decode($request->quantity);
        $totalprice = 0;
        $profit = 0;
        $i = 0;
        $bill = new Bill;
        foreach ($ids as $id) {
            $pharmacy_product = PharmacyProduct::where('pharmacy_id', $pharmacy_id)
                ->where('product_id', $id)
                ->first();
            if (!$pharmacy_product)
                break;
            $totalprice = $totalprice + ($quantities[$i] * $pharmacy_product->customer_net);
            if (!$pharmacy_product->total_amount < 0)
                break;
            $pharmacy_product->total_amount = $pharmacy_product->total_amount - $quantities[$i];
            $pharmacy_product->save();

            $info = Info::where('pharmacy_product_id', $pharmacy_product->id)->first();
            $info->quantity = $info->quantity - $quantities[$i];
            $admin->total_medicine = $admin->total_medicine - $quantities[$i];
            $info->save();
            $admin->save();
            $profit = ($pharmacy_product->profit *$quantities[$i]) + $profit;
            if ($info->quantity == 0) {
                $info->delete();
            }
            $i++;
        }
        if (!$pharmacy_product) {
            $product = Product::where("id", $pharmacy_product->id)->first();
            return response()->json([
                "message" => "product not found",
                "product" => $product->name
            ], 400);
        }
        if ($pharmacy_product->total_amount < 0) {
            return response()->json([
                'message' => "cant make the transaction , not enough quantity",
                'total amount' => $pharmacy_product->total_amount
            ], 400);
        } else {
            // return response()->json([$pharmacy_id]);
            $bill->total_price = $totalprice;
            $bill->admin_id = $pharmacy_id;
            $bill->profit_generated = $profit;
            $bill->customer_name = $request->customer_name;
            //$bill->doctor = $request->doctor;
            $bill->save();
            $admin->profit = $admin->profit + $profit;
            $admin->save();
            $j = 0;
            foreach ($ids as $id) {
                $bill_info = new Billinfo;
                $bill_info->count = $quantities[$j];
                $bill_info->product_id = $id;
                $pharmacy_product = PharmacyProduct::where('pharmacy_id', $pharmacy_id)
                    ->where('product_id', $id)->first();
                $bill_info->price = $pharmacy_product->customer_net;
                $bill_info->total = $quantities[$j] * $pharmacy_product->customer_net;
                $bill_info->bill_id = $bill->id;
                $bill_info->save();
                $j++;
            }
            return response()->json([
                "message" => "bill created successfully",
                "bill" => $bill,
            ], 200);
        }
    }

    public function get_bill()
    {
        $admin_id = auth("admin-api")->user()->id;
        $bills = Bill::where("admin_id", $admin_id)->get();
        return response()->json([
            "message" => "bills retrived successfully",
            "bills"   => $bills
        ], 200);
    }

    public function get_bill_info($bill_id) //check
    {
        $bill_infos = Billinfo::where("bill_id", $bill_id)->get();
        foreach ($bill_infos as $bill_info) {
            $product_names[] = $bill_info->products()->select('product_name', 'id')->first();
        }
        return response()->json([
            "message" => "bill restored successfully",
            "bill info" => $bill_infos,
            "product names" => $product_names
        ], 200);
    }

    public function get_profit(Request $request)
    {
        if (auth('admin-api')) {
            $rules = [
                'date_start' => 'required|date',
                'date_end' => 'required|date'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'error' => $errors
                ], 400);
            }
            $bills = Bill::whereBetween('created_at', [$request->date_start, $request->date_end])->get();
            $total_profit = 0;
            foreach ($bills as $bill) {
                $total_profit = $total_profit + $bill->profit_generated;
            }
            return response()->json([
                "message" => "profit calculated successfully",
                "total profit" => $total_profit
            ]);
        } else
            return response()->json([
                'message' => "not authorized"
            ]);
    }
}

//----------------------------------------------------REDEEMER->?-------------------------------------------------------------