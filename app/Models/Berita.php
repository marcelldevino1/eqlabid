<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beritas';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'foto',
    ];

    /**
     * Get the route key for the model.
     * * Ini berguna jika Anda ingin menggunakan slug di route publik:
     * route('publik.berita.show', $berita)
     * * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}