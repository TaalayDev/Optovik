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
use App\Models\Wholesaler\WholesalerOrderProducts;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class WholesalerOrderProductsController
{

    const table = '_order_products';
    
    var $baseName;
    function __construct($base_name)
    {
        $this->baseName = $base_name;
    }

    public function findBy($by, $val)
    {
        $wop = new WholesalerOrderProducts($this->baseName.self::table);
        return $wop->where($by, $val)->get();
    }
    
    public static function add($id, $ord_id, $products = [])
    {
        foreach ( $products as $product ) {
            $orderProduct = new WholesalerOrderProducts(Wholesaler::find($id)->base_name . self::table);
            $orderProduct->order_id = $ord_id;
            $orderProduct->product_id = $product->product_id;
            $orderProduct->quantity = $product->quantity;
            $orderProduct->save();
        }

        return redirect()->back();
    }
    
    public static function update($id, $ordprod_id, $product)
    {
        $orderProduct = WholesalerOrderProducts::table(Wholesaler::find($id)->base_name.self::table)->find($ordprod_id);
        if ( $product->quantity )
            $orderProduct->quantity = $product->quantity;
        if ( $product->state )
            $orderProduct->state = $product->state;
        $orderProduct->save();

        return redirect()->back();
    }

    public static function delete($base_name, $order_id)
    {
        $order = WholesalerOrderProducts::table($base_name.self::table)->where('order_id', $order_id);
        if ( $order ) {
            $order->delete();
        }
        return redirect()->back();
    }

    public static function createTable($base_name)
    {
        Schema::create($base_name.self::table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->smallInteger('state')->default(1);
            $table->timestamps();
        });
    }

    public static function deleteTable($base_name)
    {
        Schema::dropIfExists($base_name.self::table);
    }

}