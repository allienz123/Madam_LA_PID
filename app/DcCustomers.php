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

    /**
	 * Get the video.
	 *
	 * @return Video
	 */
	public function customer() {
		return $this -> belongsTo('App\Customers', 'customer_id');
	}

    /**
     * Get the video's language.
     *
     * @return Language
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
