<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function text()
    {
        return $this->belongsTo('App\Text');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
