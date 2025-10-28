<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassesStudent extends Model
{
    protected $table = 'classes_students';

    protected $fillable = [
        'user_id',
        'classes_id',
        'tahun_id',   // Tambahkan kolom tahun
        'is_status',
    ];

    // Relasi ke user_profiles
    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'user_id');
    }

    // Relasi ke classes
    public function classes()
    {
        return $this->belongsTo(Kelas::class, 'classes_id');
    }

    // Relasi ke tahun
    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
        public function user()
    {
        return $this->belongsTo(UserProfile::class, 'user_id');
    }
}
