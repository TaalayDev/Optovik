<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\Stores;
use App\Models\Store\StoreProductImages;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class StoreProductImagesController extends Controller
{

    const table = '_product_images';

    protected $baseName;
    function __construct($base_name)
    {
        $this->baseName = $base_name;
    }

    public static function add($id, $prod_id, $images)
    {
        foreach( $images as $image )
        {
            $productImage = new StoreProductImages(Stores::find($id)->base_name.self::table);
            $productImage->product_id = $prod_id;
            $productImage->image = base64_encode(file_get_contents($image));
            $productImage->type = 1;
            $productImage->save();
        }
        // return redirect()->back();
    }

    public static function update($id, $imid, Request $req)
    {
        $product = StoreProductImages::table(Stores::find($id)->base_name.self::table)->find($imid);
        if ( $req->input('product_id') )
            $product->product_id = $req->input('product_id');
        if ( $req->input('image') )
            $product->image = $req->input('image');
        if ( $req->input('type') )
            $product->type = $req->input('type');
        $product->save();

        return redirect()->back();
    }

    public static function delete($base_name, $id)
    {
        $product = StoreProductImages::table($base_name.self::table)->where('id', $id);
        if ( $product ) {
            $product->delete();
        }
        return redirect()->back();
    }

    public static function createTable($base_name)
    {
        Schema::create($base_name.self::table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('product_id');
            $table->text('image');
            $table->smallInteger('type')->default(1);
            $table->timestamps();
        });
    }

    public static function deleteTable($base_name)
    {
        Schema::dropIfExists($base_name.self::table);
    }
    
}
