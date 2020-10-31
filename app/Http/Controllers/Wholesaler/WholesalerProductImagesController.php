<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 25.09.2020
 * Time: 0:22
 */

namespace App\Http\Controllers\Wholesaler;


use App\Http\Controllers\CustomController;
use App\Models\Wholesaler\Wholesaler;
use App\Models\Wholesaler\WholesalerProductImage;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class WholesalerProductImagesController
{
    const table = '_product_images';

    protected $baseName;
    function __construct($base_name)
    {
        $this->baseName = $base_name;
    }

    public function findFirst($by, $val)
    {
        $wp = new WholesalerProductImage($this->baseName.self::table);
        return $wp->where($by, $val)->first();
    }
    
    public static function add($id, $prod_id, $images)
    {
        foreach( $images as $image )
        {
            $productImage = new WholesalerProductImage(Wholesaler::find($id)->base_name.self::table);
            $productImage->product_id = $prod_id;
            $productImage->image = base64_encode(file_get_contents($image));
            $productImage->type = 1;
            $productImage->save();
        }
        // return redirect()->back();
    }

    public static function update($id, $imid, Request $req)
    {
        $product = WholesalerProductImage::table(Wholesaler::find($id)->base_name.self::table)->find($imid);
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
        $product = WholesalerProductImage::table($base_name.self::table)->where('id', $id);
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