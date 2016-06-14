<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    protected $table = 'comments';

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function user(){
        return $this->belongsTo(Users::class);
    }
    public function likes(){
        return $this->hasMany(LikeComment::class);
    }
}
