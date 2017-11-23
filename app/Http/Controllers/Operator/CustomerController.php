<?php namespace App\Http\Controllers\Operator;

use App\Http\Controllers\OperatorController;
use App\Customers;
use App\DcCustomers;
use App\CustomersSegment;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Excel;
use Carbon\Carbon;

class CustomerController extends OperatorController {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('operator.customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function see($id) {

        $customers = Customers::find($id);
        $segment = $customers->customers_segment;
        $segments = CustomersSegment::all();
        return view('operator.customers.see_customer', compact('customers','segments','segment'));

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
            ->editColumn('cid_count', '<a href="{{{ URL::to(\'operator/cid/\' . $id . \'/addCid\' ) }}}" class="btn btn-primary btn-sm" >
                 {{ DB::table(\'dc_customers\')->whereNull(\'deleted_at\')->where(\'customer_id\', \'=\', $id)->count() }}</a>')
                            //{{ \App\DcCustomers::where(\'customer_id\', \'=\', $id)->whereNull(\'deleted_at\')->count() }}</a>')
              //  <a href="{{{ URL::to(\'admin/customers/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe"><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a> 

            ->addColumn('actions', '
                <a href="{{{ URL::to(\'operator/customers/\' . $id . \'/see\' ) }}}" class="btn btn-success btn-xs iframe"><span class="glyphicon glyphicon-eye-open"></span>  {{ trans("admin/modal.see") }}</a>')
            ->removeColumn('id')
            ->make();
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