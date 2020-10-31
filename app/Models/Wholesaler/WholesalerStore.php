<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 23:20
 */

namespace App\Models\Wholesaler;


use App\Http\Controllers\Store\StoreController;
use App\Models\CustomModel;

class WholesalerStore extends CustomModel
{

    public function getPhone()
    {
        return StoreController::findFirst('base_name', $this->base_name)->phone;
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