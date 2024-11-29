<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'image',
    ];


    public function getImagePathsAttribute()
    {
        return json_decode($this->image , true);
    }
}

