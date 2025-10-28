<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role_id',
        'mapel_id',
        'tahun_id',
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

    // Relasi dengan Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    // Relasi dengan Tahun
    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}
