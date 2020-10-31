<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 15:10
 */

namespace App\Http\Controllers\Wholesaler;


use App\Http\Controllers\CustomController;
use App\Http\Requests\Wholesaler\WholesalerProductRequest;
use App\Models\Wholesaler\Wholesaler;
use App\Models\Wholesaler\WholesalerProduct;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class WholesalerProductsController extends CustomController
{

    const table = '_products';

    protected $baseName;
    function __construct($base_name)
    {
        $this->baseName = $base_name;
    }

    public function getAll() 
    {
        $wp = new WholesalerProduct($this->baseName.self::table);
        return $wp->get();
    }

    public function getProductImage($id)
    {
        $wpic = new WholesalerProductImagesController($this->baseName);
        return $wpic->findFirst('product_id', $id)->image;
    }
    
    public function findBy($by, $val)
    {
        $wp = new WholesalerProduct($this->baseName.self::table);
        return $wp->where($by, $val)->get();
    }

    public function findFirst($by, $val)
    {
        $wp = new WholesalerProduct($this->baseName.self::table);
        return $wp->where($by, $val)->first();
    }
    
    public static function productsPage($id)
    {
        $wholesalerProducts = new WholesalerProduct(Wholesaler::find($id)->base_name.self::table);
        return view('wholesaler\wholesaler_products', ['wsid'=>$id, 'products' => $wholesalerProducts->get()]);
    }

    public static function addProductPage($id)
    {
        return view('wholesaler\wholesaler_add_products', ['id' => $id]);
    }

    public static function add($id, $req)
    {
        $product = new WholesalerProduct(Wholesaler::find($id)->base_name.self::table);
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
            WholesalerProductImagesController::add($id, $product->id, $req->file('images'));
        }

        return redirect()->back();
    }

    public static function update($id, $pid, Request $req)
    {
        $product = WholesalerProduct::table(Wholesaler::find($id)->base_name.self::table)->find($pid);
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
        $product = WholesalerProduct::table($base_name.self::table)->where('id', $id);
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
        WholesalerProductImagesController::createTable($base_name);
    }

    public static function deleteTable($base_name) 
    {
        Schema::dropIfExists($base_name.self::table);
        WholesalerProductImagesController::deleteTable($base_name);
    }

}