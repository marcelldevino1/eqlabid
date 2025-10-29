<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Prestasi extends Model
{
    protected $fillable = ['nama','kelas','prestasi','deskripsi','foto'];

    // URL foto yang aman (fallback ke placeholder jika file tak ada)
    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && Storage::disk('public')->exists($this->foto)) {
            return Storage::url($this->foto); // -> /storage/prestasi/xxx.jpg  (atau route fallback-mu)
        }
        return asset('images/default-placeholder.jpg');
    }
}
