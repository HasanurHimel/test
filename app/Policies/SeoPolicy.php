<?php

namespace App\Policies;

use App\Models\Admin;
use App\Seo;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeoPolicy
{
    use HandlesAuthorization;
    

    public function create(Admin $user)
    {
        foreach (auth()->user()->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->name == 'seo.crud'){
                    return true;
                }
            }
        }
        return false;
    }


}
