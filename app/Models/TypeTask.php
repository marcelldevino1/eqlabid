<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTask extends Model
{
    protected $table = 'type_task';
    protected $fillable = [
        'id_ta',
        'description',
        'start_date',
        'end_date',
        'type_task',
    ];

    // Relasi ke TeachingAssignment
    public function teachingAssignment()
    {
        return $this->belongsTo(TeachingAssignment::class, 'id_ta', 'id');
    }
    public function siswaTasks()
    {
        return $this->hasMany(TypeTaskSiswa::class, 'id_tts', 'id');
    }

}
