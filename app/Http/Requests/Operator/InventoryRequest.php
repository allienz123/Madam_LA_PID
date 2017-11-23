<?php namespace App\Http\Requests\Operator;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'device' => 'required',
            'sn' => 'required',
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
