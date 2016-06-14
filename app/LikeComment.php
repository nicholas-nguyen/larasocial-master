<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    public $timestamps = true;
    protected $table = 'like_comments';

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function Comment(){
        return $this->belongsTo(Comment::class);
    }
}
