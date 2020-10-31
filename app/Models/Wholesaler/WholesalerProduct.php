<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 15:05
 */

namespace App\Models\Wholesaler;

use App\Http\Controllers\Wholesaler\WholesalerProductImagesController;
use App\Models\CustomModel;

class WholesalerProduct extends CustomModel
{
    public static function unitName($unit)
    {
        switch($unit)
        {
            case 'lt':
                return "лт";
            case 'kg':
                return "кг";
            default:
                return "шт";
        }
    }

    public function getImage()
    {
        $wpic = new WholesalerProductImagesController($this->baseName);
        return $wpic->findFirst('product_id', $this->id)->image;
    }

}