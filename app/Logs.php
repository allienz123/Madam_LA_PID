<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Logs extends Model
{

    //use SoftDeletes;

    //protected $dates = ['deleted_at'];
    protected $table = "alarm_logs";



}
