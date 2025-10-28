<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'role_id', 'module_id', 'method_action_id',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relasi dengan Module
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    // Relasi dengan MethodAction
    public function methodAction()
    {
        return $this->belongsTo(MethodAction::class);
    }
}
