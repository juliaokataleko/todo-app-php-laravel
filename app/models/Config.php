<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $guarded = [];

    public static function num_pages() {
        $config = Config::first();
        return $config->num_pages;
    }
}
