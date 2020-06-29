<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    // avatar img

    public function getAvatarAttribute($value){
        if(isset($value)) {

            return asset('storage/' . $value );
    
        } else {
    
            return asset('images/default_avatar.jpg');
        }
    }

    // cover image
    public function getCoverAttribute($value){
        if(isset($value)) {

            return asset('storage/' . $value );
    
        } else {
    
            return asset('images/profile_paner.jpg');
        }
    }

    // to encrypt the pass

    public function setPasswordAttribute($value){
       $this->attributes['password'] = bcrypt($value);
    }

    // getting friend posts

    public function timeline(){
        
        $friends = $this->follows->pluck('id');

        return Post::whereIn('user_id', $friends)
        ->orWhere('user_id', $this->id)
        ->withLikes()
        ->latest()->paginate(50);

    }


    // posts comments likes relation with user

    public function posts(){
        return $this->hasMany(Post::class)->latest();
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }


    public function likes(){
        return $this->hasMany(Like::class);
    }

    
    // append username to profile to use path directly
    // just by calling the path function

    public function path( $append = ''){
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    
    

 
}
