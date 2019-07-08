<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PermissionFor;

class Permission extends Model
{
    protected $fillable=['name', 'permission_for_id'];

    public function permission_for(){
        return $this->belongsTo(PermissionFor::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

}
