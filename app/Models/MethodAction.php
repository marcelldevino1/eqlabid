<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MethodAction extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'method_action_module');
    }
}
