<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\FavoriteCompany;
use App\Models\FavoritePharmacy;
use App\Models\RateCompany;
use App\Models\RatePharmacy;
use App\Models\Company;
use App\Models\Bill;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\MonthProfit;
use App\Models\FavoriteProduct;

class PublicController extends Controller
{
    // ------------------favorite crd------------------------------
    public function add_favorite($favorite_id)
    {
        $id = auth('client-api')->user() ? auth('client-api')->user()->id : (auth('admin-api')->user() ? auth('admin-api')->user()->id : null);
        $client_id = auth('client-api')->user() ? auth('client-api')->user()->id : null;
        $pharmacy_id = auth('admin-api')->user() ? auth('admin-api')->user()->id  : null;
        switch ($id) {
            case $client_id:
                if (!$favorite = FavoritePharmacy::where('pharmacy_id', $favorite_id)->where('client_id', $id)->first()) {
                    $favorite = new FavoritePharmacy;
                    $favorite->pharmacy_id = $favorite_id;
                    $favorite->client_id = $id; // auth id
                    $favorite->save();
                    return response()->json([
                        'message' => 'pharmacy added successfully'
                    ]);
                }
                break;
            case $pharmacy_id:
                if (!$favorite = FavoriteCompany::where('company_id', $favorite_id)->where('pharmacy_id', $id)->first()) {
                    $favorite = new FavoriteCompany;
                    $favorite->company_id = $favorite_id;
                    $favorite->pharmacy_id = $id; // auth id
                    $favorite->save();
                    return response()->json([
                        'message' => 'company added successfully'
                    ]);
                }
                break;
            case null:
                return response()->json([
                    'message' => 'not authorized'
                ]);
                break;
            default:
                return response()->json([
                    'message' => 'already added'
                ]);
                break;
        }
    }

    public function get_favorite()
    {
        $id = auth('client-api')->user() ? auth('client-api')->user()->id : (auth('admin-api')->user() ? auth('admin-api')->user()->id : null);
        $client_id = auth('client-api')->user() ? auth('client-api')->user()->id : null;
        $pharmacy_id = auth('admin-api')->user() ? auth('admin-api')->user()->id  : null;
        switch ($id) {
            case $client_id:
                $favorite = FavoritePharmacy::where('client_id', $client_id)
                    ->with('pharmacy')
                    ->get();
                return response()->json([
                    'message' => 'favoirte pharmacies retrived successfully',
                    'favorites' => $favorite
                ]);
                break;
            case $pharmacy_id:
                $favorite = FavoriteCompany::where('pharmacy_id', $pharmacy_id)
                    ->with('companies')
                    ->get();
                return response()->json([
                    'message' => 'favoirte companies retrived successfully',
                    'favorites' => $favorite
                ]);
                break;
            case null:
                return response()->json([
                    'message' => 'not authorized'
                ]);
                break;
        }
    }

    public function delete_favorite($favorite_id)
    {
        $id = auth('client-api')->user() ? auth('client-api')->user()->id : (auth('admin-api')->user() ? auth('admin-api')->user()->id : null);
        $client_id = auth('client-api')->user() ? auth('client-api')->user()->id : null;
        $pharmacy_id = auth('admin-api')->user() ? auth('admin-api')->user()->id  : null;
        switch ($id) {
            case $client_id:
                $favorite = FavoritePharmacy::where('client_id', $client_id)
                    ->where('pharmacy_id', $favorite_id)
                    ->delete();
                return response()->json([
                    'message' => 'favoirte pharmacy deleted successfully',
                ]);
                break;
            case $pharmacy_id:
                $favorite = FavoriteCompany::where('pharmacy_id', $pharmacy_id)
                    ->where('company_id', $favorite_id)
                    ->delete();
                return response()->json([
                    'message' => 'company deleted successfully',
                ]);
                break;
            case null:
                return response()->json([
                    'message' => 'not authorized'
                ]);
                break;
        }
    }
    //  ------------------ rate crud -----------------------------------------
    public function add_rate(Request $request, $rated_id)
    {
        $id = auth('client-api')->user() ? auth('client-api')->user()->id : (auth('admin-api')->user() ? auth('admin-api')->user()->id : null);
        $client_id = auth('client-api')->user() ? auth('client-api')->user()->id : null;
        $pharmacy_id = auth('admin-api')->user() ? auth('admin-api')->user()->id  : null;

        switch ($id) {
            case $client_id:
                if (!$rate = RatePharmacy::where('pharmacy_id', $rated_id)
                    ->where('client_id', $id)
                    ->first()) {
                    $rate = new RatePharmacy();
                    $rate->pharmacy_id = $rated_id;
                    $rate->client_id = $id; // auth id
                    $rate->star_rating = $request->star_rating;
                    $rate->save();

                    $totalRates = RatePharmacy::where('pharmacy_id', $rated_id)
                        ->sum('star_rating');
                    $ratesCount = RatePharmacy::where('pharmacy_id', $rated_id)
                        ->count();
                    $averge_rate = round($totalRates / $ratesCount, 1);
                    $pharmacy = Admin::where('id', $rated_id)->first();
                    $pharmacy->rate = $averge_rate;
                    $pharmacy->save();
                } else return response()->json([
                    'message' => 'pharmacy already rated'
                ]);
                break;

            case $pharmacy_id:
                if (!$rate = RateCompany::where('company_id', $rated_id)
                    ->where('pharmacy_id', $id)
                    ->first()) {
                    $rate = new RateCompany;
                    $rate->company_id = $rated_id;
                    $rate->pharmacy_id = $id; // auth id
                    $rate->star_rating = $request->star_rating;
                    $rate->save();
                    $totalRates = RateCompany::where('company_id', $rated_id)
                        ->sum('star_rating');
                    $ratesCount = RateCompany::where('company_id', $rated_id)
                        ->count();
                    $averge_rate = round($totalRates / $ratesCount, 1);
                    $company = Company::where('id', $rated_id)->first();
                    $company->rate = $averge_rate;
                    $company->save();
                    return response()->json([
                        'message' => 'company rated successfully'
                    ]);
                } else return response()->json([
                    'message' => 'company already rated'
                ]);
                break;
        }
    }

    public function edit_rate(Request $request, $rated_id)
    {
        $id = auth('client-api')->user() ? auth('client-api')->user()->id : (auth('admin-api')->user() ? auth('admin-api')->user()->id : null);
        $client_id = auth('client-api')->user() ? auth('client-api')->user()->id : null;
        $pharmacy_id = auth('admin-api')->user() ? auth('admin-api')->user()->id  : null;

        switch ($id) {
            case $client_id:
                $rate = RatePharmacy::where('pharmacy_id', $rated_id)
                    ->where('client_id', $id)
                    ->first();
                if (isset($request->star_rating))
                    $rate->star_rating = $request->star_rating;
                $rate->save();
                $totalRates = RatePharmacy::where('pharmacy_id', $rated_id)
                    ->sum('star_rating');
                $ratesCount = RatePharmacy::where('pharmacy_id', $rated_id)
                    ->count();
                $averge_rate = round($totalRates / $ratesCount, 1);
                $pharmacy = Admin::where('id', $rated_id)->first();
                $pharmacy->rate = $averge_rate;
                $pharmacy->save();
                return response()->json([
                    'message' => 'pharmacy rate edited successfully'
                ]);
                break;

            case $pharmacy_id:
                $rate = RateCompany::where('company_id', $rated_id)
                    ->where('pharmacy_id', $id)
                    ->first();
                if (isset($request->star_rating))
                    $rate->star_rating = $request->star_rating;
                $rate->save();
                $totalRates = RateCompany::where('company_id', $rated_id)
                    ->sum('star_rating');
                $ratesCount = RateCompany::where('company_id', $rated_id)
                    ->count();
                $averge_rate = round($totalRates / $ratesCount, 1);
                $company = Company::where('id', $rated_id)->first();
                $company->rate = $averge_rate;
                $company->save();
                return response()->json([
                    'message' => 'company rate edited successfully'
                ]);
                break;
        }
    }
    public function delete_rate($rated_id)
    {
        $id = auth('client-api')->user() ? auth('client-api')->user()->id : (auth('admin-api')->user() ? auth('admin-api')->user()->id : null);
        $client_id = auth('client-api')->user() ? auth('client-api')->user()->id : null;
        $pharmacy_id = auth('admin-api')->user() ? auth('admin-api')->user()->id  : null;

        switch ($id) {
            case $client_id:
                $rate = RatePharmacy::where('pharmacy_id', $rated_id)
                    ->where('client_id', $id)
                    ->delete();
                $totalRates = RatePharmacy::where('pharmacy_id', $rated_id)
                    ->sum('star_rating');
                $ratesCount = RatePharmacy::where('pharmacy_id', $rated_id)
                    ->count();
                $averge_rate = round($totalRates / $ratesCount, 1);
                $pharmacy = Admin::where('id', $rated_id)->first();
                $pharmacy->rate = $averge_rate;
                $pharmacy->save();
                return response()->json([
                    'message' => 'pharmacy rate deleted successfully'
                ]);
                break;

            case $pharmacy_id:
                $rate = RateCompany::where('company_id', $rated_id)
                    ->where('pharmacy_id', $id)
                    ->delete();
                $totalRates = RateCompany::where('company_id', $rated_id)
                    ->sum('star_rating');
                $ratesCount = RateCompany::where('company_id', $rated_id)
                    ->count();
                $averge_rate = round($totalRates / $ratesCount, 1);
                $company = Company::where('id', $rated_id)->first();
                $company->rate = $averge_rate;
                $company->save();
                return response()->json([
                    'message' => 'company rate deleted successfully'
                ]);
                break;
        }
    }

    public function aa()  // = = == = = = handle function  dont punish up
    {
        // $admins = Admin::all();
        // foreach ($admins as $admin) {
        //     $month_profit = MonthProfit::where('admin_id', $admin->id)->latest('updated_at')->first();
        //     $currentDate = Carbon::now();
        //     $month = $currentDate->format('m');
        //     if (!$month_profit) {
        //         $month_profit = new MonthProfit;
        //         $month_profit->admin_id = $admin->id;
        //         $month_profit->profit_list = json_encode(array_fill(0, $month - 1, 0));
        //         $month_profit->save();
        //     }
        //     $profit_generated_month = Bill::where('admin_id', $admin->id)
        //         ->whereMonth('created_at', $month)
        //         ->sum('profit_generated');
        //     $profit_list =  json_decode($month_profit->profit_list);
        //     if (count($profit_list) < 12) {
        //         $profit_list[] = $profit_generated_month;
        //         $profit_list = Arr::flatten($profit_list);
        //         $month_profit->profit_list = json_encode($profit_list);
        //         $month_profit->save();
        //     } else {
        //         $month_profit = new MonthProfit;
        //         $month_profit->admin_id = $admin->id;
        //         $month_profit->profit_list = json_encode(array_fill(0, 1, $profit_generated_month));
        //         $month_profit->save();
        //     }
        // }
        $admins = Admin::all();
        $currentDate = Carbon::now();
        $month = $currentDate->format('m');
        foreach ($admins as $admin) {            // first loop
            $month_profit = MonthProfit::where('admin_id', $admin->id)->latest('updated_at')->first();
            $profit_generated_month = Bill::where('admin_id', $admin->id)
                ->whereMonth('created_at', $month)
                ->sum('profit_generated');
            if (!$month_profit) {
                $month_profit = new MonthProfit;
                $month_profit->admin_id = $admin->id;
                $month_profit->profit_list = json_encode(array_fill(0, $month - 1, 0));
                $month_profit->save();
            }
        }
        foreach ($admins as $admin) {    //second loop
            $month_profit = MonthProfit::where('admin_id', $admin->id)->latest('updated_at')->first();
            $profit_generated_month = Bill::where('admin_id', $admin->id)
                ->whereMonth('created_at', $month)
                ->sum('profit_generated');
            //return response()->json([$profit_generated_month]);
            $profit_list =  json_decode($month_profit->profit_list);
            if ($month_profit) {
                if (count($profit_list) < 12) {
                    $profit_list[] = $profit_generated_month;
                    $profit_list = Arr::flatten($profit_list);
                    $month_profit->profit_list = json_encode($profit_list);
                    $month_profit->save();
                    //return response()->json([count($profit_list)]);
                } else {
                    $month_profit = new MonthProfit;
                    $month_profit->admin_id = $admin->id;
                    $month_profit->profit_list = json_encode(array_fill(0, 1, $profit_generated_month));
                    $month_profit->save();
                }
            }
        }
    }
    public function aa2()
    {                                      // don't punish up 
        $favorits = FavoriteProduct::all();
        foreach ($favorits as $favorite) {
            if ($favorite->timer_condition == 'always') {
                if ($favorite->timer_status == false) {
                    $favorite->timer2 = $favorite->timer2 - 1;
                    $favorite->save();
                }
                if ($favorite->timer2 == 0) {
                    $favorite->timer2 = $favorite->timer;
                    $favorite->timer_status = true;
                    $favorite->save();
                }
            }
        }
    }
}


//////// --------------------------------- Redeemer --------------------------------  ////////