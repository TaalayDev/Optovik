<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.09.2020
 * Time: 0:41
 */

namespace App\Models\Store;


use App\Models\CustomModel;

class StoreOrder extends CustomModel
{

    public function prodCount()
    {
        // $wop = new StoreOrderProductsController(auth()->user()->base_name);
        return 0; // count($wop->findBy('order_id', $this->id));
    }

    public function totalSumm()
    {
        return 0;
    }

    public function date()
    {
        return $this->created_at;
    }
    
}