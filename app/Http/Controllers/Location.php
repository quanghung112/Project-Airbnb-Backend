<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\SubDistrict;
use Illuminate\Http\Request;

class Location extends Controller
{
    public function getCity()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    public function getDistrict($matp)
    {
        $districts = District::where('matp', $matp)->get();
        return response()->json($districts);
    }

    public function getSubDistrict($maqh)
    {
        $subDistricts = SubDistrict::where('maqh', $maqh)->get();
        return response()->json($subDistricts);
    }
}
