<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    
    public static function getAll()
    {
        return City::all();
    }
    
    public static function getCityName($id)
    {
        return City::find($id)->name;
    }
    
}
