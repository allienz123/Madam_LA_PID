<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomersSegment extends Model
{

    use SoftDeletes;
    protected $table = 'customers_segment';
    protected $dates = ['deleted_at'];

    
}
