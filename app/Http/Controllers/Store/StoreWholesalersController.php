<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.09.2020
 * Time: 0:52
 */

namespace App\Http\Controllers\Store;


use App\Http\Controllers\CustomController;
use App\Http\Requests\Store\StoreWholesalerRequest;
use App\Models\Store\Stores;
use App\Models\Store\StoreWholesaler;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class StoreWholesalersController
{
    const table = '_wholesalers';
    
    var $storeWholesaler;
    protected $baseName;
    function __construct($base_name)
    {
        $this->baseName = $base_name;
    }

    public function getAll()
    {
        $ws = new StoreWholesaler($this->baseName.self::table);
        return $ws->get();
    }
    
    public function findBy($by, $val)
    {
        $ws = new StoreWholesaler($this->baseName.self::table);
        return $ws->where($by, $val)->get();
    }

    public function findFirst($by, $val)
    {
        $ws = new StoreWholesaler($this->baseName.self::table);
        return $ws->where($by, $val)->first();
    }
    
    public static function add($id, StoreWholesalerRequest $req)
    {
        $store = new StoreWholesaler(Stores::find($id)->base_name.self::table);
        $store->name = $req->input('name', '');
        $store->base_name = $req->input('base_name', '');
        $store->state = $req->input('state', 0);
        $store->save();

        return redirect()->back();
    }

    public static function update($id, Request $req)
    {
        $store = new StoreWholesaler(Stores::find($id)->base_name.self::table);
        if ( $req->input('name') )
            $store->name = $req->input('name');
        if ( $req->input('base_name') )
            $store->base_name = $req->input('base_name');
        if ( $req->input('state') )
            $store->store = $req->input('state');
        $store->save();

        return redirect()->back();
    }

    public static function delete($base_name, $id)
    {
        $store = StoreWholesaler($base_name.self::table)->find($id);
        if ( $store ) {
            $store->delete();
        }
        return redirect()->back();
    }

    public static function createTable($base_name)
    {
        Schema::create($base_name.self::table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('base_name');
            $table->smallInteger('state');
            $table->timestamps();
        });
    }

    public static function deleteTable($base_name)
    {
        Schema::dropIfExists($base_name.'_wholesalers');
    }
}