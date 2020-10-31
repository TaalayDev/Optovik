<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 14:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomModel extends Model
{
    
    public function __construct($table = null)
    {
        parent::__construct();
        $this->table = $table;
    }
    
    public static function table($table) {
        return DB::table($table);
    }

    public static function find($table, $id)
    {
        return DB::table($table)->find($id);
    }
    
}