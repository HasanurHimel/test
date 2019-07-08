<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilesPolicy
{
    use HandlesAuthorization;

    public function create()
    {
        $profile =Profile::where('admin_id', auth()->user()->id)->first();
        if ($profile!==NULL) {
            return false;
        } else {
            return true;
        }

    }

    public function view()
    {
        $profile =Profile::where('admin_id', auth()->user()->id)->first();
        if ($profile!==NULL) {
            return true;
        } else {
            return false;
        }

    }
}
