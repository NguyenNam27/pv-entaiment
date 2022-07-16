<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use App\Ward;
use Illuminate\Http\Request;



class LocationController extends Controller
{
    public function loadDistrict(Request $request)
    {
        $province = Province::find((int)$request->provinceid);
        $district = District::from("districts")->where("provinceid", $province->provinceid)->get();
        return response()->json($district);
    }

    public function loadWard(Request $request)
    {
        $locationDistrict = District::find((int)$request->districtid);
        $ward = Ward::from('wards')->where('districtid',$locationDistrict->districtid)->get();
        return response()->json($ward);
    }


}
