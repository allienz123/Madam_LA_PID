<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Customers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Datatables;

class ExCustomerController extends AdminController {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.customers.ex_customer');
    }

     /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function activate($id)
    {
        $customer = Customers::withTrashed()->find($id)->restore();
        Session::flash('flash_message', 'Success');
        Session::flash('flash_type', 'alert-info');
        //flash('Activation success');
        return view('admin.customers.ex_customer');
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
            ->addColumn('actions', '
                <a href="{{{ URL::to(\'admin/excustomer/\' . $id . \'/activate\' ) }}}" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-check"></span>  {{ trans("admin/modal.activate") }}</a>')
            ->removeColumn('id')
            ->make();
        
       
    }




}