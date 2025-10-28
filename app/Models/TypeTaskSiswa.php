<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTaskSiswa extends Model
{
    use HasFactory;
    protected $table = 'type_task_siswa'; 
    protected $fillable = [
        'id_tts', // task id
        'user_id',
        'description',
        'nilai',
        'status',
        'jumlah_tugas',
        'link',
    ];

    // Relasi dengan model User (siswa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model TypeTask
    public function typeTask()
    {
        return $this->belongsTo(TypeTask::class, 'id_tts');
    }
}
