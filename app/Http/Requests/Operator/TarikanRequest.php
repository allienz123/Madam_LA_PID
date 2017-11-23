<?php namespace App\Http\Requests\Operator;

use Illuminate\Foundation\Http\FormRequest;

class TarikanRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
   		// $user = User::find($this->dc_customers);
	
		return [
           // 'cid' => 'required|unique:tarikankabel,cid,' .$this->id,
            //'nama_pelanggan' => 'required',
            //'requester' => 'required',
            //'datek_from' => 'required',
            //'datek_to' => 'required',
            //'status' => 'required',         
            
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
