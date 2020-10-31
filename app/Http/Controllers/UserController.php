<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 1:05
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function getName($id)
    {
        return User::find($id)->name;
    }

    public static function findBy($by, $val)
    {
        if ( $by == 'id' )
            return User::find($val);
        return User::where($by, $val)->get();
    }

    public static function getAll()
    {
        return User::all();
    }

    public function delete($id, $back = 302)
    {
        $user = User::find($id);
        if ( $user ) {
            $user->delete();
        }
        if ( $back > 0 )
            return redirect()->back(["status"=>$back]);
    }

    public function add(Request $req)
    {
        $validatedData = $req->validate([
            'email'    => 'required|email|unique:users',
            'name'     => 'required|min:3|max:20|unique:users',
            'phone'    => 'nullable|numeric',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user = [
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'phone' => $req->input('phone'),
            'password' => $req->input('password'),
            'role' => $req->input('role', 'user'),
            'base_name' => $req->input('base_name', ''),
            'state' => 1
        ];

        RegisterController::createUser($user);

        return redirect()->back();
    }

    public function update($id, Request $req)
    {
        $user = User::find($id);
        if ( $user ) {
            if ( $req->input('name') )
                $user->name = $req->input('name');
            if ( $req->input('email') )
                $user->email = $req->input('email');
            // $wholesaler->base_name = Utils::cyrToLat($req->input('name'));
            if ( $req->input('phone') )
                $user->phone = $req->input('phone');
            if ( $req->input('role') )
                $user->password = $req->input('role');
            if ( $req->input('base_name') )
                $user->password = $req->input('base_name');
            if ( $req->input('password') )
                $user->password = bcrypt($req->input('password'));
            if ( $req->input('state') )
                $user->state = $req->input('state');
            $user->save();
        }
        return redirect()->back();
    }

}