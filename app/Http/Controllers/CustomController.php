<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 23:21
 */

namespace App\Http\Controllers;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

abstract class CustomController extends Controller
{
    
    abstract public static function add($id, $req);
    abstract public static function update($id, $x, Request $req);
    abstract public static function delete($base_name, $id);
    
    abstract public static function createTable($base_name);
    abstract public static function deleteTable($base_name);
    
}