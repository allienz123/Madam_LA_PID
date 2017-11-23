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
use Carbon\Carbon;
use Excel;


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
              //  <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe"><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a> 

            ->addColumn('actions', '
                <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-xs iframe"><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a> 
                <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/delete\' ) }}}" class="btn btn-danger btn-xs iframe"><span class="glyphicon glyphicon-trash"></span>  {{ trans("admin/modal.delete") }}</a>')
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

    public function exportExcel() 
    {
        $date = Carbon::now('Asia/Jakarta')->format('d_m_Y');
        //Set excel title
        Excel::create('CustomerDC'.'_'. $date, function($excel) {
        //First sheet
        $excel->sheet('Customer', function($sheet) {

        // first row styling and writing content
        $sheet->mergeCells('A1:D1');
        $sheet->loadView('export');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(30);
        });

        //$sheet->row(1, array('Lintasarta Customer'));

        // second row styling and writing content
        $sheet->row(2, function ($row) {

            // call cell manipulation methods
            $row->setFontFamily('Calibri');
            $row->setFontSize(15);
            $row->setFontWeight('bold');

        }); 

        $sheet->row(2, array('No.','Customer','Sales','Segmentation'));
        //Make freeze view
        $sheet->setFreeze('A3');

        $customers = Customers::join('customers_segment','customers_segment.id','=','customers.customers_segment')
            ->select(array(
                'customers.customer_name',
                'customers.customer_sales', 
                'customers_segment.segment_name'))->get();
         
        // putting users data as next rows
        $number=1;
        foreach ($customers as $customer) 
        {
            $sheet->appendRow(array($number,$customer->customer_name,$customer->customer_sales,$customer->segment_name));
            $number++;
        }

         }); //End of sheet
        //End of excel
        })->export('xlsx');
    }


}