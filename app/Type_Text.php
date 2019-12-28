<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Text extends Model
{
    public function texts()
    {
        return $this->hasMany('App\Text');
    }
}
