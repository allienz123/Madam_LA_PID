<?php namespace App\Http\Controllers\Operator;

use App\Http\Controllers\OperatorController;
use App\TarikanKabel;
use App\Customers;
use App\DcCustomers;
use App\CustomersSegment;
use App\Http\Requests\Operator\TarikanRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Operator\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Carbon\Carbon;
use Excel;

class TarikanController extends OperatorController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        // Show the page
        return view('operator.tarikan.index_tarikan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getCreate()
    {
        
        $customers = Customers::all();
        $customer = "";
        
        return view('operator.tarikan.create_edit_tarikan', 
                compact('customers','customer'));
    }

    public function postCreate(TarikanRequest $request) {

        $tarikankabel = new TarikanKabel ();
        //$tarikankabel -> user_id = Auth::id();
        $tarikankabel -> cid = $request->cid; //$request for handling validation
        $tarikankabel -> nama_pelanggan = $request->nama_pelanggan;
        $tarikankabel -> requester = $request->requester;
        $tarikankabel -> datek_from = $request->datek_from;
        $tarikankabel -> datek_to = $request->datek_to;
        $tarikankabel -> via = $request->via;
        $tarikankabel -> status = $request->status;
        $tarikankabel -> save();
    }

    public function getEdit($id) {
        $tarikankabel = TarikanKabel::find($id);
        $customers = Customers::all();
        $customer = $tarikankabel->nama_pelanggan;
        
        return view('operator.tarikan.create_edit_tarikan', 
            compact('tarikankabel','customers','customer'));

    }

    public function postEdit(TarikanRequest $request, $id) {

        $tarikankabel = TarikanKabel::find($id);
       // $tarikankabel -> user_id = Auth::id();
        $tarikankabel -> cid = $request->cid; //$request for handling validation
        $tarikankabel -> nama_pelanggan = $request->nama_pelanggan;
        $tarikankabel -> requester = $request->requester;
        $tarikankabel -> datek_from = $request->datek_from;
        $tarikankabel -> datek_to = $request->datek_to;
        $tarikankabel -> via = $request->via;
        $tarikankabel -> status = $request->status;
        $tarikankabel -> save();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function getDelete($id)
    {
        $tarikankabel = $id;
        // Show the page
        return view('operator.tarikan.delete', compact('tarikankabel'));
    }

    
    public function postDelete(DeleteRequest $request,$id)
    {
        $tarikankabel = TarikanKabel::find($id);
        $tarikankabel -> delete();
    }

    public function see($id) {
        $tarikankabel = TarikanKabel::find($id);
        $customers = Customers::all();
        $customer = $tarikankabel->nama_pelanggan;
        return view('operator.tarikan.see_tarikan', compact('tarikankabel','customers','customer'));
    }

   public function data()
    {
        $tarikankabel = TarikanKabel::join('customers','customers.id','=','tarikankabel.nama_pelanggan')
            ->select(array(
                'tarikankabel.id',
                'tarikankabel.cid',
                'customers.customer_name', 
                'tarikankabel.requester', 
              ));
        return Datatables::of($tarikankabel)
            
            ->addColumn('Actions', '
             <a href="{{{ URL::to(\'operator/activity/\' . $id . \'/see\' ) }}}" class="btn btn-success btn-xs iframe"><span class="glyphicon glyphicon-eye-open"></span>  {{ trans("admin/modal.see") }}</a> 
             <a href="{{{ URL::to(\'operator/activity/\' . $id . \'/edit\' ) }}}" class="btn btn-warning btn-xs iframe"><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a> 
             <a href="{{{ URL::to(\'operator/activity/\' . $id . \'/delete\' ) }}}" class="btn btn-danger btn-xs iframe"><span class="glyphicon glyphicon-trash"></span>  {{ trans("admin/modal.delete") }}</a>')
            ->removeColumn('id')

            //->filterColumn('id')
            ->make();
    }

    public function getReorder(ReorderRequest $request) {
        $list = $request->list;
        $items = explode(",", $list);
        $order = 1;
        foreach ($items as $value) {
            if ($value != '') {
                TarikanKabel::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}