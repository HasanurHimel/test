<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;
    

    public function viewAny(Admin $user)
    {

        foreach (\auth()->user()->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->name == 'blog.create'||$permission->name == 'blog.update'||$permission->name == 'blog.delete'||$permission->name == 'blog.edit'||$permission->name == 'blog.status'){
                    return true;
                }
            }
        }
        return false;
    }

    public function create(Admin $user)
    {

        return $this->getPermissions($user, 'blog.create');
    }


    public function update(Admin $user)
    {

        return $this->getPermissions($user, 'blog.update');
    }




    /**
     * Determine whether the user can update the blog.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */

	
	public function view(Admin $user)
    {
        return $this->getPermissions($user, 'blog.edit');
    }




    public function publication_status(Admin $user)
    {
        return $this->getPermissions($user, 'blog.status');
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function delete(Admin $user)
    {

        return $this->getPermissions($user, 'blog.delete');
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
        
    }




    public function forceDelete(Admin $user, Blog $blog)
    {
        //
    }


    protected function getPermissions($user, $permission_name){

        foreach (\auth()->user()->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->name == $permission_name){
                    return true;
                }
            }
        }
        return false;


}




}
