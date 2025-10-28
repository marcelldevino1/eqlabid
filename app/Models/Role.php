<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    // Dibawah function tambahan untuk RBAC nya 
        public function permissions()
    {
        return $this->hasMany(ModulePermission::class);
    }
}
