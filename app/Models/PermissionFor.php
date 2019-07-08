<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class PermissionFor extends Model
{
    protected $guarded=[];

    public function permissions(){
       return $this->hasMany(Permission::class);
    }

}
