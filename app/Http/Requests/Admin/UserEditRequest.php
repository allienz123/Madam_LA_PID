<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required|min:3',
            'confirmed' => 'required',
            'admin' => 'required',
		];
	}

	public function messages()
	{
    	return [
        'confirmed.required' => 'The activate user field is required',
        'admin.required'  => 'The role field is required',
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
