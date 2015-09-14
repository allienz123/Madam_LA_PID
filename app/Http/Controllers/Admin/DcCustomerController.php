<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Customers;
use App\DcLocation;
use App\DcCustomers;
use App\ServiceType; 
use App\Http\Requests\Admin\DcCustomerRequest;
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
     * Show a list of all the photo posts.
     *
     * @return View
     */
    public function addCid($id) {
        $album = Customers::find($id);
        // Show the page
        return view('admin.customers.dc_index', compact('album'));
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function see($id) {
        $dccustomer = DcCustomers::find($id);
        $customers = Customers::all();
        $customer = $dccustomer->customer_id;
        $locations = DcLocation::all();
        $location = $dccustomer->dc_location;
        $service_types = ServiceType::all();
        $service_type = $dccustomer->service_type;
        return view('admin.customers.see_cid', compact('dccustomer','customers','customer','location','locations','service_type','service_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(DcCustomerRequest $request) {

        $dccustomer = new DcCustomers();
        $dccustomer -> user_id = Auth::id();
        $dccustomer -> cid = $request->cid; //$request for handling validation
        $dccustomer -> customer_id = $request->customer_id;
        $dccustomer -> dc_location = $request->dc_location;
        $dccustomer -> service_type = $request->service_type;
        $dccustomer -> ip_address = $request->ip_address;
        $dccustomer -> netmask = $request->netmask;
        $dccustomer -> gateway = $request->gateway;
        $dccustomer -> fpb_date = date("Y-m-d", strtotime($request->fpb_date));
        $dccustomer -> of_date = date("Y-m-d", strtotime($request->of_date));
        $dccustomer -> ob_date = date("Y-m-d", strtotime($request->ob_date));
        $dccustomer -> rack_location = $request->rack_location;
        $dccustomer -> u_location = $request->u_location;
        $dccustomer -> port = $request->port;
        $dccustomer -> power = $request->power;
        $dccustomer -> save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($id) {
        $dccustomer = DcCustomers::find($id);
        $customers = Customers::all();
        $customer = $dccustomer->customer_id;
        $locations = DcLocation::all();
        $location = $dccustomer->dc_location;
        $service_types = ServiceType::all();
        $service_type = $dccustomer->service_type;
        return view('admin.customers.create_edit_dc_customer', compact('dccustomer','customers','customer','location','locations','service_type','service_types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit(DcCustomerRequest $request, $id) {

        $dccustomer = DcCustomers::find($id);
        $dccustomer -> user_id_edited = Auth::id();
        $dccustomer -> cid = $request->cid;
        $dccustomer -> customer_id = $request->customer_id;
        $dccustomer -> dc_location = $request->dc_location;
        $dccustomer -> service_type = $request->service_type;
        $dccustomer -> ip_address = $request->ip_address;
        $dccustomer -> netmask = $request->netmask;
        $dccustomer -> gateway = $request->gateway;
        $dccustomer -> fpb_date = $request->fpb_date;
        $dccustomer -> fpb_date = date("Y-m-d", strtotime($request->fpb_date));
        $dccustomer -> of_date = date("Y-m-d", strtotime($request->of_date));
        $dccustomer -> ob_date = date("Y-m-d", strtotime($request->ob_date));
        $dccustomer -> save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */

    public function getDelete($id)
    {
        $dccustomer = $id;
        // Show the page
        return view('admin.customers.dc_customer_delete', compact('dccustomer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $dccustomer = DcCustomers::find($id);
        $dccustomer -> delete();
    }

     /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data($albumid=0)
    {
        $condition =(intval($albumid)==0)?">":"=";
        $dccustomer = DcCustomers::join('customers','customers.id','=','dc_customers.customer_id')
            ->join('service_type','service_type.id','=','dc_customers.service_type')
            ->join('dc_location','dc_location.id','=','dc_customers.dc_location')
            ->where('dc_customers.customer_id',$condition,$albumid)
           // ->select(array('dc_customers.id','dc_customers.cid', 'customers.customer_name', 'dc_location.location_name'));
            ->select(array('dc_customers.id', DB::raw($albumid . ' as albumid'), DB::getTablePrefix().'dc_customers.cid', DB::getTablePrefix().'service_type.service_name', DB::getTablePrefix().'customers.customer_name', DB::getTablePrefix(). 'dc_location.location_name', 'dc_customers.rack_location'));
        
        return Datatables::of($dccustomer)
            ->addColumn('Actions', '
                <a href="{{{ URL::to(\'admin/cid/\' . $id . \'/see\' ) }}}" class="btn btn-success btn-sm iframe"><span class="glyphicon glyphicon-eye-open"></span>  {{ trans("admin/modal.see") }}</a> 
                <a href="{{{ URL::to(\'admin/cid/\' . $id . \'/edit\' ) }}}" class="btn btn-warning btn-sm iframe"><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a> 
                <a href="{{{ URL::to(\'admin/cid/\' . $id . \'/delete\' ) }}}" class="btn btn-success btn-danger iframe"><span class="glyphicon glyphicon-trash"></span>  {{ trans("admin/modal.delete") }}</a>')
            ->removeColumn('id')
            ->removeColumn('albumid')

            //->filterColumn('id')
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