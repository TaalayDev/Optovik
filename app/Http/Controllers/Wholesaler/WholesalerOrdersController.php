<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 18:22
 */

namespace App\Http\Controllers\Wholesaler;


use App\Http\Controllers\CustomController;
use App\Http\Requests\Wholesaler\WholesalerOrderRequest;
use App\Models\Wholesaler\Wholesaler;
use App\Models\Wholesaler\WholesalerOrder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class WholesalerOrdersController extends CustomController
{

    var $wholesalerOrder;
    function __construct($base_name)
    {
        $this->wholesalerOrder = new WholesalerOrder($base_name.'_orders');
    }

    public static function add($id, WholesalerOrderRequest $req)
    {
        $order = new WholesalerOrder(Wholesaler::find($id)->base_name.'_orders');
        $order->product_id = $req->input('product_id');
        $order->quantity = $req->input('quantity');
        $order->comment = $req->input('comment', '');
        $order->state = 0;
        $order->save();

        return redirect()->back();
    }
    
    public static function update($id, Request $req)
    {
        $order = new WholesalerOrder(Wholesaler::find($id)->base_name.'_orders');
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
        $order = WholesalerOrder($base_name.'_orders')->find($id);
        if ( $order ) {
            $order->delete(); 
        }
        return redirect()->back();
    }

    public static function createTable($base_name)
    {
        Schema::create($base_name.'_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('comment');
            $table->smallInteger('state');
            $table->timestamps();
        });
    }

    public static function deleteTable($base_name)
    {
        Schema::dropIfExists($base_name.'_orders');
    }

}