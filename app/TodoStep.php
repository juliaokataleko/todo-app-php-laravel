<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoStep extends Model
{

    protected $guarded = [];

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
    
}
