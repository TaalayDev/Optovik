<?php

namespace App\Http\Controllers\Wholesaler;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Store\StoreWholesalersController;
use App\Http\Requests\Wholesaler\WholesalerProductRequest;
use App\Http\Requests\Wholesaler\WholesalerRequest;
use App\Models\Wholesaler\Wholesaler;
use Illuminate\Http\Request;
use App\Utils\Utils;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class WholesalerController extends Controller
{

    public function addPage() 
    {
        return view('wholesaler.wholesalers_add');
    }

    public function updatePage($id) 
    {
        return view('wholesaler\wholesalers_update', ['wholesaler'=>Wholesaler::find($id)]);
    }
    
    public function allProductsPage($id) 
    {
        return WholesalerProductsController::productsPage($id);
    }
    
    public function addProductPage($id) 
    {
        return WholesalerProductsController::addProductPage($id);
    }
    
    public function addProduct($id, WholesalerProductRequest $req)
    {
        return WholesalerProductsController::add($id, $req);
    }

    public function deleteProduct($id, $pid)
    {
        return WholesalerProductsController::delete(Wholesaler::find($id)->base_name, $pid);
    }

    public static function findBy($by, $val)
    {
        if ( $by == 'id' )
            return Wholesaler::find($val);
        return Wholesaler::where($by, $val)->get();
    }
    
    public static function findFirst($by, $val)
    {
        return Wholesaler::where($by, $val)->first();
    }

    public static function filterWithStore($baseName, $city = 0)
    {
        $wholesalers = array();
        foreach ( Wholesaler::cursor() as $wholesaler )
        {

        }
    }

    public static function filterOW($baseName, $city = 0) 
    {
        $wholesalers = array();
        foreach ( Wholesaler::cursor() as $wholesaler )
        {
            $swc = new StoreWholesalersController($baseName);
            $wsc = new WholesalerStoresController($wholesaler->base_name);
            if ( $swc->findFirst('base_name', $wholesaler->base_name) === null
                && ($city == 0 || $city == $wholesaler->city)
                && $wsc->findFirst('base_name', $baseName) === null )
                $wholesalers[] = $wholesaler;
        }
        return $wholesalers;
    }
    
    public static function filterSOW($baseName, $city = 0)
    {
        $wholesalers = self::filterSW($baseName, $city);
        $wholesalers = self::filterOW($baseName, $city);
        return $wholesalers;
    }
    
    public static function filterSW($wBaseName, $city = 0)
    {
        $wholesalers = array();
        foreach ( Wholesaler::cursor() as $wholesaler )
        {
            $swc = new StoreWholesalersController($wBaseName);
            $wsc = new WholesalerStoresController($wholesaler->base_name);
            if ( $swc->findFirst('base_name', $wholesaler->base_name) === null
                && ($city == 0 || $city == $wholesaler->city)
                && $wsc->findFirst('base_name', $wBaseName) !== null )
                $wholesalers[] = $wholesaler;
        }
        return $wholesalers;
    }

    public static function getAll()
    {
        return Wholesaler::all();
    }
    
    public static function getName($id)
    {
        return Wholesaler::find($id)->name;
    }

    public function add(WholesalerRequest $req)
    {
        $wholesaler = new Wholesaler();
        $wholesaler->name = $req->input('name');
        $wholesaler->info = $req->input('info', '');
        $wholesaler->base_name = Utils::textToBaseName($req->input('name'));
        $wholesaler->phone = $req->input('phone');
        $wholesaler->city = $req->input('city', 1);
        $wholesaler->type = $req->input('type', 1);
        $wholesaler->state = $req->input('state', 1);

        if ( $req->input('user_name') )
        {
            $rules = array(
                'user_email'    => 'required|email|unique:users,email',
                'user_name'     => 'required|min:3|max:20|unique:users,name',
                'user_phone'    => 'nullable|numeric',
                'user_password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
            );

            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            }

            $user = [
                'name' => $req->input('user_name'),
                'email' => $req->input('user_email'),
                'phone' => $req->input('user_phone'),
                'password' => $req->input('user_password'),
                'role' => 'wholesaler',
                'base_name' => $wholesaler->base_name,
                'state' => 1
            ];
            RegisterController::createUser($user);
        }

        $wholesaler->save();

        WholesalerProductsController::createTable($wholesaler->base_name);
        WholesalerOrdersController::createTable($wholesaler->base_name);
        WholesalerStoresController::createTable($wholesaler->base_name);

        return redirect()->back();
    }

    public function update($id, Request $req)
    {
        $wholesaler = Wholesaler::find($id);
        if ( $wholesaler ) {
            if ( $req->input('name') )
                $wholesaler->name = $req->input('name');
            if ( $req->input('info') )
                $wholesaler->info = $req->input('info');
            // $wholesaler->base_name = Utils::cyrToLat($req->input('name'));
            if ( $req->input('phone') )
                $wholesaler->phone = $req->input('phone');
            if ( $req->input('type') )
                $wholesaler->type = $req->input('type');
            if ( $req->input('state') )
                $wholesaler->state = $req->input('state');
            $wholesaler->save();
        }
        return redirect()->back();
    }

    public function delete($id, $back = 302)
    {
        $wholesaler = Wholesaler::find($id);
        if ( $wholesaler ) {
            WholesalerProductsController::deleteTable($wholesaler->base_name);
            WholesalerOrdersController::deleteTable($wholesaler->base_name);
            WholesalerStoresController::deleteTable($wholesaler->base_name);
            $wholesaler->delete();
        }
        if ( $back > 0 )
            return redirect()->back(["status"=>$back]);
    }
    
    

}
