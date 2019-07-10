<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'status',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class);
    }


    public function roles(){
        return $this->belongsToMany( Role::class);
    }


    public function isSuperAdmin($ability){
        foreach (\auth()->user()->roles as $role){

                if ($role->name==$ability){
                    return true;
                }


        }

    }

//    public function isSuperAdmin($ability){
//        foreach (\auth()->user()->roles as $role){
//            foreach ($role->permissions as $permission) {
//                if ($permission->name==$ability){
//                    return true;
//                }
//            }
//
//        }
//
//    }




}
