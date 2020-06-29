<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['comment', 'user_id', 'post_id'];
    // protected $guarded = [];
    
    // protected $fillable = [
    //     'post_id',
    //     'comment',
    //     'user_id',
        

    // ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function post() {
        return $this->belongsTo('App\Post');
    }
}
