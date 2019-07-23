<?php

namespace App\Policies;

use App\Models\Admin;
use App\Advertise;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisePolicy
{
    use HandlesAuthorization;

    public function create(Admin $user)
    {
        foreach (auth()->user()->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->name == 'advertise.crud'){
                    return true;
                }
            }
        }
        return false;

    }

}
