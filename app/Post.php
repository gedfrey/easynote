<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function content()
    {
        return $this->hasMany(Content::class);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
