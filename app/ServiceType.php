<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'service_type';
    protected $dates = ['deleted_at'];

}
