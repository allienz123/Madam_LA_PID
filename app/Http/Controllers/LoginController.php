<?php namespace App\Http\Controllers;

use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('auth/login');
	}

}