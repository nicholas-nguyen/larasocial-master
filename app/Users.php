<?php

namespace App;

use App\Status;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = true;
    protected $table = 'users';

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function getAvatarUrl()
    {
        return "http://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likesComment()
    {
        return $this->hasMany(LikeComment::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getName()
    {
        if ($this->firstname && $this->lastname)
            return "{$this->firstname} {$this->lastname}";
        if ($this->firstname)
            return $this->firstname;
        return null;
    }

    public function getNameOrFullName()
    {
        return $this->getName() ?: $this->firstname;
    }

    public function getFirstNameOrFullName()
    {
        return $this->firstname ?: $this->firstname;
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany('App\Users', 'friends', 'user_id', 'friend_id');
    }

    public function friendsOf()
    {
        return $this->belongsToMany('App\Users', 'friends', 'friend_id', 'user_id');
    }

    public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()->merge($this->friendsOf()->wherePivot('accepted', true)->get());
    }

    public function friendRequests()
    {
        return $this->friendsOf()->wherePivot('accepted', false)->get();
    }

    public function friendRequestsPending()
    {
        return $this->friendsOf()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestsPending(Users $user)
    {
        return (bool)$this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestsReceived(Users $user)
    {
        return (bool)$this->friendRequests()->where('id', $user->id)->count();
    }

    public function addFriends(Users $user)
    {
        $this->friendsOfMine()->attach($user->id);
    }

    public function deleteFriend(Users $user)
    {
        $this->friendsOf()->detach($user->id);
        $this->friendsOfMine()->detach($user->id);
    }

    public function acceptFriendRequest(Users $user)
    {
        $this->friendRequests()->where('id', $user->id)->first()->pivot->update([
            'accepted' => true,
        ]);
    }

    public function isFriendsWith(Users $user)
    {
        return (bool)$this->friends()->where('id', $user->id)->count();
    }

    public function hasLikedStatus(Status $status)
    {
//        $sta = Status::where('id',$status)->first();
//        return $status->likes()
//                      ->where('status_id', $status->id)
//                      ->where('user_id', $this->id)
//                      ->count();
        return (bool)$status->likes()->where('user_id', $this->id)->count();
    }

    public function hasLikedComment(Comment $comment)
    {
//        $sta = Status::where('id',$status)->first();
//        return $status->likes()
//                      ->where('likeable_id', $status->id)
//                      ->where('likeable_type',get_class($status))
//                      ->where('user_id', $this->id)
//                      ->count();
        return (bool)$comment->likes()->where('user_id', $this->id)->count();
    }

    public static function checkFriendStatus($myId, $friendId)
    {

        $result = null;
        $check1 = Friend::where('user_id', $myId)
            ->where('friend_id', $friendId)
            ->get()->toArray();
        if (count($check1) > 0) {
            if($check1[0]['accepted'] == 0)
            //wating
                $result = 1;
            else
            //unfriend
                $result = 2;
        }


        $check2 = Friend::where('user_id', $friendId)
            ->where('friend_id',$myId )
            ->get()->toArray();


        if (count($check2) > 0) {
            if($check2[0]['accepted'] == 0)
            //accept
                $result = 3;
            else
            //unfriend
                $result = 4;
        }

        //var_dump($result); die();
        //add status
        return $result;
    }
}
