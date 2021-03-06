<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function microposts()
    {
        return $this->hasMany(Micropost::class);
    }

    public function matusita()
    {
        return $this->email;
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }


    public function favorites()
    {
        return $this->belongsToMany(Micropost::class, 'favorites', 'user_id', 'micropost_id')->withTimestamps();
    }




    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }

    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身かどうかの確認
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }

    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }

    public function favorite($micropostsId)
    {
        // 既にお気に入りしているかどうかかの確認
        $exist = $this->is_favoriting($micropostsId);

        if ($exist) {
            // 既にお気に入りしていれば何もしない
            return false;
        } else {
            // 未お気にりであればお気に入りする
            $this->favorites()->attach($micropostsId);
            return true;
        }
    }

    public function unfavorite($micropostsId)
    {
       // 既にお気に入りしているかどうかかの確認
       $exist = $this->is_favoriting($micropostsId);


        if ($exist) {
            // 既にお気に入りしていればお気に入りを外す
            $this->favorites()->detach($micropostsId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }

    public function is_favoriting($micropostsId)
    {
        return $this->favorites()->where('micropost_id', $micropostsId)->exists();
    }




}
