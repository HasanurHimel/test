<?php

namespace App\Policies;

use App\Models\Admin;
use App\Notice;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticePolicy
{
    use HandlesAuthorization;
    

    public function create(Admin $user)
    {
        foreach(auth()->user()->roles as $role){
            foreach($role->permissions as $permission){
                if($permission->name=='notice.crud'){
                    return true;
                }
            }
        }

        return false;


    }


}
