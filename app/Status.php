<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = true;
    protected $table = 'statuses';

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
    
    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
