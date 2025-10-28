<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'classes_student_id',
        'nilai',
        'keterangan',
        'tahun',
    ];

    public function student()
    {
        return $this->belongsTo(ClassesStudent::class, 'classes_student_id');
    }
}
