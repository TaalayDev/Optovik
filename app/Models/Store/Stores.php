<?php

namespace App\Models\Store;

use App\Http\Controllers\CityController;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    public function cityName()
    {
        return CityController::getCityName($this->city);
    }

    public static function stateName($state)
    {
        switch($state)
        {
            case 0:
                return "неактив";
            case 1:
                return "актив";
            default:
                return "нет";
        }
    }

}
