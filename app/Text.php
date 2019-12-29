<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    public function content()
    {
        return $this->hasOne('App\Content');
    }

    public function type_text()
    {
        return $this->belongsTo('App\Type_Text');
    }
}
