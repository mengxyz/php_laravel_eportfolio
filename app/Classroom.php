<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'c_id',
        'c_name',
        'std_id',
        't_id',
    ];
}
