<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'kd_kelas',
        'nm_kelas',
        'is_stats',
    ];
        public function students()
    {
        return $this->hasMany(ClassesStudent::class, 'classes_id');
    }
}
