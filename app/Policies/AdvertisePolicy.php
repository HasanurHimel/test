<?php

namespace App\Policies;

use App\Models\Admin;
<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\Advertise;
=======
use App\Advertise;
>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
=======
use App\Advertise;
>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisePolicy
{
    use HandlesAuthorization;

    public function create(Admin $user)
    {
<<<<<<< HEAD
<<<<<<< HEAD
        foreach (auth()->user()->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->name == 'advertise.crud') {
=======
        foreach (auth()->user()->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->name == 'advertise.crud'){
>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
=======
        foreach (auth()->user()->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->name == 'advertise.crud'){
>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
                    return true;
                }
            }
        }
<<<<<<< HEAD
<<<<<<< HEAD

        return false;
    }
=======
=======
>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
        return false;

    }

<<<<<<< HEAD
>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
=======
>>>>>>> 72bebc7e15e22ee47b837812f9d9c4c6b556f2ab
}
