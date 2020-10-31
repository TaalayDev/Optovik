<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\StoreProducts;
use App\Models\Store\Stores;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class StoreProductsController extends Controller
{

    const table = '_products';

    protected $baseName;
    function __construct($base_name)
    {
        $this->baseName = $base_name;
    }

    public static function add($id, $req)
    {
        $product = new StoreProducts(Stores::find($id)->base_name.self::table);
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->quantity = $req->input('quantity');
        $product->unit = $req->input('unit');
        $product->description = $req->input('description', '');
        $product->state = $req->input('state', 1);
        $product->type = $req->input('type', 1);
        $product->save();

        if ( $req->hasFile('images') )
        {
            StoreProductImagesController::add($id, $product->id, $req->file('images'));
        }

        return redirect()->back();
    }

    public static function update($id, $pid, Request $req)
    {
        $product = StoreProducts::table(Stores::find($id)->base_name.self::table)->find($pid);
        if ( $req->input('name') )
            $product->name = $req->input('name');
        if ( $req->input('price') )
            $product->price = $req->input('price');
        if ( $req->input('quantity') )
            $product->quantity = $req->input('quantity');
        if ( $req->input('unit') )
            $product->unit = $req->input('unit');
        if ( $req->input('description') )
            $product->description = $req->input('description');
        if ( $req->input('state') )
            $product->state = $req->input('state');
        if ( $req->input('type') )
            $product->type = $req->input('type');
        $product->save();

        return redirect()->back();
    }

    public static function delete($base_name, $id)
    {
        $product = StoreProducts::table($base_name.self::table)->where('id', $id);
        if ( $product ) {
            $product->delete();
        }
        return redirect()->back();
    }

    public static function createTable($base_name)
    {
        Schema::create($base_name.self::table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->float('price');
            $table->integer('quantity');
            $table->string('unit', 5);
            $table->string('description');
            $table->smallInteger('state')->default(1);
            $table->smallInteger('type')->default(1);
            $table->timestamps();
        });
        StoreProductImagesController::createTable($base_name);
    }

    public static function deleteTable($base_name)
    {
        Schema::dropIfExists($base_name.self::table);
        StoreProductImagesController::deleteTable($base_name);
    }
    
}
