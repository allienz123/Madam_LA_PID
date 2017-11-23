<?php namespace App\Http\Controllers;

use App\Customers;
use App\DcCustomers;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use DNS1D;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');

		//parent::__construct();

		//$this->news = $news;
		//$this->user = $user;
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// echo '<br/>';
		// echo '<br/>';
		// echo '<br/>';
		// echo '<br/>';
		// echo '<br/>';
		// $data = '20160301120301';
		// echo DNS1D::getBarcodeHTML($data, "C128", 2,25);
		// echo $data;
		$title = "Dashboard";
        $customers = Customers::count();
        $cids = DcCustomers::count();
		return view('pages.home',  compact('title','customers','cids'));
	}

}