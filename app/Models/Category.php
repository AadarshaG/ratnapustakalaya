<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable= ['title'];

    public function committee()
    {
        return $this->belongsToMany('App\Models\Committee');
    }
}
