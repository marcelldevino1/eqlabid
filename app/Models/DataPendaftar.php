<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendaftar extends Model
{
    use HasFactory;

    protected $table = 'data_pendaftar';

    protected $fillable = [
        'full_name', 'email', 'national_id', 'family_card_number', 'phone_number',
        'birth_place', 'birth_date', 'gender', 'address', 'nationality', 'province',
        'city_district', 'sub_district', 'village', 'rw', 'rt', 'postal_code',
        'father_name', 'mother_name', 'siblings_count', 'child_number', 'bio', 'is_stats'
    ];
}
