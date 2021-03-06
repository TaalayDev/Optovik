<?php

namespace App\Models\Wholesaler;

use App\Http\Controllers\CityController;
use Illuminate\Database\Eloquent\Model;

class Wholesaler extends Model
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
