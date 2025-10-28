<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAssignment extends Model
{
    protected $table = 'user_assignments';

    protected $fillable = [
        'user_id',
        'role_id',
        'tahun_id',
    ];


    public function user_profile()
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'id'); 
        // user_id di user_assignments -> id di user_profiles
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}
