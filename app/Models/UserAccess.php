<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    protected $table = 'users'; // sumber utama username/password
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'status', // tambahkan status jika ada di tabel
    ];

    // Relasi ke user profile
    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'id');
    }

    // Relasi ke user_assignments untuk role
    public function userAssignment()
    {
        return $this->hasOne(UserAssignment::class, 'user_id', 'user_id');
    }

    // Relasi ke role
    public function role()
    {
        return $this->hasOneThrough(Role::class, UserAssignment::class, 'user_id', 'id', 'user_id', 'role_id');
    }
}
