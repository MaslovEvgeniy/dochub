<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = ['name', 'desc', 'place', 'date'];
}
