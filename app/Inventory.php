<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{

    //use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "test";


}
