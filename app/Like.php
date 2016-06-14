<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = true;
    protected $table = 'likes';

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
