<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 25.09.2020
 * Time: 15:20
 */

namespace App\Models\Wholesaler;

use App\Http\Controllers\Wholesaler\WholesalerProductsController;
use App\Models\CustomModel;

class WholesalerOrderProducts extends CustomModel
{
    
    protected function getProduct($base_name)
    {
        if ( !$base_name )
            if ( auth()->check() )
                $base_name = auth()->user()->base_name;
            else return '';
        $wpc = new WholesalerProductsController($base_name);
        return $wpc->findFirst('id', $this->product_id);
    }
    
    public function getName($base_name = null)
    {
        return $this->getProduct($base_name)->name;
    }

    public function getPrice($base_name = null)
    {
        return $this->getProduct($base_name)->price;
    }

    public function getImage($base_name = null)
    {
        if ( !$base_name )
            if ( auth()->check() )
                $base_name = auth()->user()->base_name;
            else return '';
        $wpc = new WholesalerProductsController($base_name);
        return $wpc->getProductImage($this->product_id);
    }
    
}