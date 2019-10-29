<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'std_id',
        'std_name',
        'std_address',
        'std_tel',
        'std_pic',
        'pa_id',
        'c_id',
    ];
}

