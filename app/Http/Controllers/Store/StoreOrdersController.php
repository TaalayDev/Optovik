<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.09.2020
 * Time: 0:38
 */

namespace App\Http\Controllers\Store;


use App\Http\Controllers\CustomController;
use App\Http\Requests\Store\StoreOrdersRequest;
use App\Models\Store\StoreOrder;
use App\Models\Store\Stores;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StoreOrdersController
{
    var $storeOrder;
    function __construct($base_name)
    {
        $this->storeOrder = new StoreOrder($base_name.'_orders');
    }

    public static function add($id, StoreOrdersRequest $req)
    {
        $order = new StoreOrder(Stores::find($id)->base_name.'_orders');
        $order->product_id = $req->input('product_id');
        $order->quantity = $req->input('quantity');
        $order->comment = $req->input('comment', '');
        $order->state = 0;
        $order->save();

        return redirect()->back();
    }

    public static function update($id, Request $req)
    {
        $order = new StoreOrder(Stores::find($id)->base_name.'_orders');
        if ( $req->input('product_id') )
            $order->product_id = $req->input('product_id');
        if ( $req->input('quantity') )
            $order->quantity = $req->input('quantity');
        if ( $req->input('comment') )
            $order->comment = $req->input('comment');
        if ( $req->input('state') )
            $order->state = $req->input('state');
        $order->save();

        return redirect()->back();
    }

    public static function delete($base_name, $id)
    {
        $order = StoreOrder($base_name.'_orders')->find($id);
        if ( $order ) {
            $order->delete();
        }
        return redirect()->back();
    }

    public static function createTable($base_name)
    {
        Schema::create($base_name.'_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('type')->default(1);
            $table->unsignedBigInteger('client');
            $table->string('comment')->nullable();
            $table->smallInteger('state')->default(1);
            $table->timestamps();
        });
        
    }
    
    public static function deleteTable($base_name)
    {
        Schema::dropIfExists($base_name.'_orders');
    }
    
}