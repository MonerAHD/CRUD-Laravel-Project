<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'category',
        'title',
        'description',
        'image',
        'user_id',
    ];

    public function tags(){
        
        return $this->belongsToMany(Tag::class);
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    }

    public function comments(){

        return $this->hasMany(Comment::class); // إضافة علاقة الربط في نموذج البوستات

    }


}

