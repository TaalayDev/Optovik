<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'base_name', 'state', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function roleName($role)
    {
        switch($role)
        {
            case 'admin':
                return '';
            case 'wholesaler':
                return 'оптовик';
            case 'store':
                return 'магазин';
            default:
                return 'пользователь';
        }
    }

    public static function stateName($state)
    {
        switch($state)
        {
            case 0:
                return "неактив";
            case 1:
                return "актив";
            default:
                return "нет";
        }
    }
    
}
