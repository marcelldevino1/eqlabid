<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_id',  // Tambahkan user_id di sini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function assignment()
    {
        return $this->hasOne(UserAssignment::class);
    }

    public function role()
    {
        return $this->hasOneThrough(Role::class, UserAssignment::class, 'user_id', 'id', 'id', 'role_id');
    }
}
