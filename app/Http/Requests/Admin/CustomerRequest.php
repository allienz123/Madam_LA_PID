<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'customer_name' => 'required|unique:customers,customer_name',
            'customers_segment' => 'required|integer',
            'customer_sales' => 'required',           
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
