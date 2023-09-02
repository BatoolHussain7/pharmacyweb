<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\GeoIP;

class LocationController extends Controller
{
    public function set_location()
    {
        $ip = request()->ip();
        /////// $location = GeoIP::getLocation($ip);
        // $country = $location->country;
        // $city = $location->city;
    }
}





















    //       ****               ****     
    //     **      **       **        **
    //   **          **   **             **
    //  **              **                 **
    // **                                   **
    //  **                                 **
    //    **                             **
    //      **                         **
    //        **                     **
    //          **                 **
    //            **             **
    //              **         **
    //                **     **
    //                  ** **
    //                    **
