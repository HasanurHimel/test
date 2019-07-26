<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\BlogSection;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogSectionPolicy
{
    use HandlesAuthorization;


    public function create(Admin $user)
    {
        foreach (auth()->user()->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->name == 'blog-section.crud') {
                    return true;
                }
            }
        }

        return false;
    }

}
