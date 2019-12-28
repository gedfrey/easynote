<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function text()
    {
        return $this->hasOne('App\Text');
    }
}
