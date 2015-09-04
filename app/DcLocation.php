<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;


class DcLocation extends Model
{
    //
    use SoftDeletes;
	protected $table = 'dc_location';
    protected $dates = ['deleted_at'];
}
