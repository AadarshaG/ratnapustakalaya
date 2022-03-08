<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $fillable= ['category_id','title','position','image'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getAll()
    {
        return $this->with('category')->latest()->get();
    }
}
