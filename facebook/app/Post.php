<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Post extends Model
{
    use Likable;

    // it is more secure to use fillable

    protected $guarded = [];

    // users comments rel with post
    
    public function user(){
         return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
    
}
