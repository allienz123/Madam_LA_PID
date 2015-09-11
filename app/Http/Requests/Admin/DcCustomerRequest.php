<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DcCustomerRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
   		// $user = User::find($this->dc_customers);
	
		return [
            'cid' => 'required|unique:dc_customers,cid,' .$this->id,
            'customer_id' => 'required',
            'dc_location' => 'required',
            'service_type' => 'required',
            'fpb_date' => 'required',

            //'ip_address' => 'required', 
            //'netmask' => 'required', 
            //'gateway' => 'required', 

           
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
