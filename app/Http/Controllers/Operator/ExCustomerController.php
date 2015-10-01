<?php namespace App\Http\Controllers\Operator;

use App\Http\Controllers\OperatorController;
use App\Customers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Datatables;

class ExCustomerController extends OperatorController {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('operator.customers.ex_customer');
    }

     /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
           $customer = Customers::join('customers_segment','customers_segment.id','=','customers.customers_segment')
            ->select(array('customers.id','customers.customer_name','customers.customer_sales','customers_segment.segment_name', 'customers.deleted_at'))
            ->onlyTrashed()
            ->get();
            return Datatables::of($customer)
            ->removeColumn('id')
            ->make();
        
       
    }




}