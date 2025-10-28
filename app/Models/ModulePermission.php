<?php

// app/Models/ModulePermission.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModulePermission extends Model
{
    protected $fillable = ['role_id', 'module_id', 'method_action_id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function methodAction()
    {
        return $this->belongsTo(MethodAction::class);
    }
}
