<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 23:10
 */

namespace App\Http\Controllers\Wholesaler;


use App\Http\Controllers\CustomController;
use App\Models\Wholesaler\Wholesaler;
use App\Models\Wholesaler\WholesalerStore;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class WholesalerStoresController extends CustomController
{

    const table = '_stores';

    protected $baseName;
    function __construct($base_name)
    {
        $this->baseName = $base_name;
    }

    public function getAll()
    {
        $ws = new WholesalerStore($this->baseName.self::table);
        return $ws->get();
    }
    
    public function findBy($by, $val)
    {
        $ws = new WholesalerStore($this->baseName.self::table);
        return $ws->where($by, $val)->get();
    }

    public function findFirst($by, $val)
    {
        $ws = new WholesalerStore($this->baseName.self::table);
        return $ws->where($by, $val)->first();
    }
    
    public static function add($id, $req)
    {
        $store = new WholesalerStore(Wholesaler::find($id)->base_name.self::table);
        $store->name = $req->input('name', '');
        $store->base_name = $req->input('base_name', '');
        $store->state = $req->input('state', 1);
        $store->save();

        return redirect()->back();
    }
    
    public static function update($id, $sid, Request $req)
    {
        $store = WholesalerStore::table(Wholesaler::find($id)->base_name.self::table)->find($sid);
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
        $store = WholesalerStore::table($base_name.self::table)->where('id', $id);
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
            $table->smallInteger('state')->default(1);
            $table->smallInteger('type')->default(1);
            $table->timestamps();
        });
    }

    public static function deleteTable($base_name)
    {
        Schema::dropIfExists($base_name.self::table);
    }

}