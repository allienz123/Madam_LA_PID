<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class DcCustomers extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "dc_customers";
 		
  
}
