<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarikanKabel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tarikankabel';
    protected $dates = ['deleted_at'];

}
