<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserProfile extends Model
{
use HasFactory;


protected $fillable = [
'user_id', 'full_name', 'email', 'national_id', 'family_card_number',
'phone_number', 'birth_place', 'birth_date', 'gender', 'address',
'nationality', 'province', 'city_district', 'sub_district', 'village',
'rw', 'rt', 'postal_code', 'father_name', 'mother_name',
'siblings_count', 'child_number', 'bio','is_stats'
];


public function user()
{
return $this->belongsTo(User::class);
}
}