<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Customers;
use App\CustomersSegment;
use App\DcLocation;
use App\DcCustomers;
use App\ServiceType; 
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Datatables;

class DcCustomerController extends AdminController {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.customers.dc_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        $dc_customers = DcCustomers::all();
        $dc_customer = "";
        $customers = Customers::all();
        $customer = "";
        $locations = DcLocation::all();
        $location = "";
        $service_types = ServiceType::all();
        $service_type = "";
        return view('admin.customers.create_edit_dc_customer', 
                compact('dc_customer','dc_customers','location',
                'locations','service_type','service_types','customers','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(CustomerRequest $request) {

        $dc_customer = new DcCustomers ();
        $dc_customer -> nojar = $request->cid;
		$dc_customer -> customer_name = $request->customer_name;
        $dc_customer -> location = $request->location;
        $dc_customer -> service_type = $request->service_type;
        $dc_customer -> ip_address = $request->ip_address;
        $dc_customer -> netmask = $request->netmask;
        $dc_customer -> gateway = $request->gateway;
        $dc_customer -> save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($id) {

        $customers = Customers::find($id);
        $segment = $customers->customers_segment;
        $segments = CustomersSegment::all();
        return view('admin.customers.create_edit', compact('customers','segments','segment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit(CustomerRequest $request, $id) {

        $customers = Customers::find($id);
        $customers -> customer_name = $request->customer_name;
        $customers -> customers_segment = $request->customers_segment;
        $customers -> customer_sales = $request->customer_sales;
        $customers -> customer_cp = $request->customer_cp;
        $customers -> save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */

    public function getDelete($id)
    {
        $customers = $id;
        // Show the page
        return view('admin.customers.delete', compact('customers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $customers = Customers::find($id);
        $customers -> delete();
    }

     /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $dc_customers = DcCustomers::join('customers','customers.id','=','dc_customers.customer_id')
            ->join('service_type','service_type.id','=','dc_customers.service_type')
            ->join('dc_location','dc_location.id','=','dc_customers.dc_location')
            ->select(array('dc_customers.id', 'dc_customers.cid', 'customers.customer_name', 'dc_location.location_name'));
        return Datatables::of($dc_customers)
            ->add_column('Actions', '<a href="{{{ URL::to(\'admin/customers/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe"><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a> 
                <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/delete\' ) }}}" class="btn btn-success btn-danger iframe"><span class="glyphicon glyphicon-trash"></span>  {{ trans("admin/modal.delete") }}</a>')
            ->remove_column('id')
            ->make();
    }

    /**
     * Reorder items
     *
     * @param items list
     * @return items from @param
     */
    public function getReorder(ReorderRequest $request) {
        $list = $request->list;
        $items = explode(",", $list);
        $order = 1;
        foreach ($items as $value) {
            if ($value != '') {
                DcCustomers::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }


}