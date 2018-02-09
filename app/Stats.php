<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    public $timestamps = false;
    protected $fillable = ['count'];
}
