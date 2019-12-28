<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
