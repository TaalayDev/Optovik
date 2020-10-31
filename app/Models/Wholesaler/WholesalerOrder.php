<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 18:28
 */

namespace App\Models\Wholesaler;


use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Wholesaler\WholesalerOrderProductsController;
use App\Models\CustomModel;

class WholesalerOrder extends CustomModel
{
    public function clientName()
    {
        return $this->type == 1 ? StoreController::findBy('id', $this->client)->name : '';
    }

    public function prodCount()
    {
        $wop = new WholesalerOrderProductsController(auth()->user()->base_name);
        return count($wop->findBy('order_id', $this->id));
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