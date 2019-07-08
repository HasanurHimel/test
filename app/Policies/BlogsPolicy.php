<?php

namespace App\Policies;

use App\Models\Admin;
use App\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogsPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any blogs.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the blog.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function view(Admin $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can create blogs.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the blog.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function update(Admin $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function delete(Admin $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can restore the blog.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function restore(Admin $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the blog.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function forceDelete(Admin $user, Blog $blog)
    {
        //
    }
}
