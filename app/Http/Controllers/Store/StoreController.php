<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Wholesaler\WholesalerStoresController;
use App\Http\Requests\Store\StoreRequest;
use App\Models\Store\Stores;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function fc_() 
    {
        return 'OK';
    }

    public static function findBy($by, $val)
    {
        if ( $by == 'id' )
            return Stores::find($val);
        return Stores::where($by, $val)->get();
    }

    public static function findFirst($by, $val)
    {
        return Stores::where($by, $val)->first();
    }

    public static function getAll()
    {
        return Stores::all();
    }

    public static function getName($id)
    {
        return Stores::find($id)->name;
    }

    public static function filterWS($wBaseName, $city = 0)
    {
        $stores = array();
        foreach ( Stores::cursor() as $store )
        {
            $wsc = new WholesalerStoresController($wBaseName);
            $swc = new StoreWholesalersController($store->base_name);
            if ( $wsc->findFirst('base_name', $store->base_name) === null
                && ($city == 0 || $city == $store->city) 
                && $swc->findFirst('base_name', $wBaseName) !== null )
                $stores[] = $store;
        }
        return $stores;
    }

    public function add(StoreRequest $req)
    {
        $store = new Stores();
        $store->name = $req->input('name');
        $store->info = $req->input('info', '');
        $store->base_name = Utils::textToBaseName($req->input('name'));
        $store->phone = $req->input('phone');
        $store->address = $req->input('address', '');
        $store->location = $req->input('location', '');
        $store->type = $req->input('type', 1);
        $store->state = $req->input('state', 1);

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
                    ->withInput(Input::except('user_password')); // send back the input (not the password) so that we can repopulate the form
            }

            $user = [
                'name'      => $req->input('user_name'),
                'email'     => $req->input('user_email'),
                'phone'     => $req->input('user_phone'),
                'password'  => $req->input('user_password'),
                'role'      => 'wholesaler',
                'base_name' => $store->base_name,
                'state'     => 1
            ];
            RegisterController::createUser($user);
        }

        $store->save();

        StoreOrdersController::createTable($store->base_name);
        StoreWholesalersController::createTable($store->base_name);

        return redirect()->back();
    }

    public function update($id, Request $req)
    {
        $store = Stores::find($id);
        if ( $store ) {
            if ( $req->input('name') )
                $store->name = $req->input('name');
            if ( $req->input('info') )
                $store->info = $req->input('info');
            // $store->base_name = Utils::cyrToLat($req->input('name'));
            if ( $req->input('phone') )
                $store->phone = $req->input('phone');
            if ( $req->input('address') )
                $store->address = $req->input('address');
            if ( $req->input('location') )
                $store->location = $req->input('location');
            if ( $req->input('type') )
                $store->type = $req->input('type');
            if ( $req->input('state') )
                $store->state = $req->input('state');
            $store->save();
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $store = Stores::find($id);
        if ( $store ) {
            $store->delete();
        }
        return redirect()->back();
    }
    
}
