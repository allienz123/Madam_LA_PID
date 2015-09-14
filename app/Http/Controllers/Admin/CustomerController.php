<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Customers;
use App\DcCustomers;
use App\CustomersSegment;
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class CustomerController extends AdminController {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        $segments = CustomersSegment::all();
        $segment = "";
        return view('admin.customers.create_edit', compact('segments','segment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(CustomerRequest $request) {

        $customers = new Customers ();
        $customers -> user_id = Auth::id();
        $customers -> customer_name = $request->customer_name;
		$customers -> customers_segment = $request->customers_segment;
        $customers -> customer_sales = $request->customer_sales;
        $customers -> customer_cp = $request->customer_cp;
        $customers -> save();
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
        $customers -> user_id_edited = Auth::id();
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
        $customer = Customers::join('customers_segment','customers_segment.id','=','customers.customers_segment')
            ->select(array(
                'customers.id',
                'customers.customer_name',
                'customers.customer_sales', 
                'customers_segment.segment_name', 
                'customers.id as cid_count'));
        return Datatables::of($customer)
            ->editColumn('cid_count', '<a href="{{{ URL::to(\'admin/cid/\' . $id . \'/addCid\' ) }}}" class="btn btn-primary btn-sm" >
                 {{ DB::table(\'dc_customers\')->whereNull(\'deleted_at\')->where(\'customer_id\', \'=\', $id)->count() }}</a>')
                            //{{ \App\DcCustomers::where(\'customer_id\', \'=\', $id)->whereNull(\'deleted_at\')->count() }}</a>')

            ->addColumn('actions', '<a href="{{{ URL::to(\'admin/cid/\' . $id . \'/addCid\' ) }}}" class="btn btn-info btn-sm" ><span class="glyphicon glyphicon-open"></span>  {{ trans("admin/modal.items") }}</a>
                <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe"><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a> 
                <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/delete\' ) }}}" class="btn btn-success btn-danger iframe"><span class="glyphicon glyphicon-trash"></span>  {{ trans("admin/modal.delete") }}</a>')
            ->removeColumn('id')
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
                Customers::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }


}