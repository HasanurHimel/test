<?php

namespace App\Policies;

use App\Models\Admin;
use App\Notice;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any notices.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the notice.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Notice  $notice
     * @return mixed
     */
    public function view(Admin $user, Notice $notice)
    {
        //
    }

    /**
     * Determine whether the user can create notices.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the notice.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Notice  $notice
     * @return mixed
     */
    public function update(Admin $user, Notice $notice)
    {
        //
    }

    /**
     * Determine whether the user can delete the notice.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Notice  $notice
     * @return mixed
     */
    public function delete(Admin $user, Notice $notice)
    {
        //
    }

    /**
     * Determine whether the user can restore the notice.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Notice  $notice
     * @return mixed
     */
    public function restore(Admin $user, Notice $notice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the notice.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Notice  $notice
     * @return mixed
     */
    public function forceDelete(Admin $user, Notice $notice)
    {
        //
    }
}
