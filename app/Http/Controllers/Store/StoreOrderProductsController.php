<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 27.10.2020
 * Time: 16:02
 */

namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use App\Models\Store\StoreOrderProducts;
use App\Models\Store\Stores;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StoreOrderProductsController extends Controller
{
    const table = '_order_products';

    var $baseName;
    function __construct($base_name)
    {
        $this->baseName = $base_name;
    }

    public static function add($id, $ord_id, $products = [])
    {
        foreach ( $products as $product ) {
            $orderProduct = new StoreOrderProducts(Stores::find($id)->base_name . self::table);
            $orderProduct->order_id = $ord_id;
            $orderProduct->product_id = $product->product_id;
            $orderProduct->quantity = $product->quantity;
            $orderProduct->save();
        }

        return redirect()->back();
    }

    public static function update($id, $ordprod_id, $product)
    {
        $orderProduct = StoreOrderProducts::table(Stores::find($id)->base_name.self::table)->find($ordprod_id);
        if ( $product->quantity )
            $orderProduct->quantity = $product->quantity;
        if ( $product->state )
            $orderProduct->state = $product->state;
        $orderProduct->save();

        return redirect()->back();
    }

    public static function delete($base_name, $order_id)
    {
        $order = StoreOrderProducts::table($base_name.self::table)->where('order_id', $order_id);
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