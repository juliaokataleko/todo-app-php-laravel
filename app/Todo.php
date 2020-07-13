<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // protected $guarded = [];
    protected $fillable= [
        'title', 'description', 'user_id', 'completed'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function steps()
    {
        return $this->hasMany(TodoStep::class);
    }

}
