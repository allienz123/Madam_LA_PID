<?php namespace App\Http\Controllers\Operator;

use App\Http\Controllers\OperatorController;
use App\Http\Requests\Operator\InventoryRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Inventory;
use App\User;
use App\Customers;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Carbon\Carbon;
use Session;



class InventoryController extends OperatorController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        return view('operator.inventory.index');
    }

     public function loggingIndex()
    {
        
        return view('operator.inventory.indexLogging');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getCreate() {

        
        return view('operator.inventory.create', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($id) {

        $inventory = Inventory::find($id);
        //Edit status information to IN or OUT
        if($inventory->status == 1){
            $status = 'IN';
        }
        else { $status = 'OUT'; }
        $ownership = Customers::all();
        $owner = $inventory->belong_to;

        return view('operator.inventory.edit', compact('inventory', 'owner', 'ownership', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit(UserEditRequest $request, $id) {

        $user = User::find($id);
        $user -> name = $request->name;
        $user -> username = $request->username;
        $user -> email = $request->email;

        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $user -> password = bcrypt($password);
            }
        }

        $user -> save();
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function addInventory(InventoryRequest $request) {

        $device = Input::get('device');
        $barcode = Input::get('time');
        $sn = Input::get('sn');
        $notes = Input::get('notes');
        // foreach ($device as $key => $value) {
        //     # code...
        //     $inventory = new Inventory ();
        //     $inventory->device = $request->device;
            for($i = 1; $i <= count($device); ++$i){
             $inventory = new Inventory ();
             $inventory->device = $device[$i];
             $inventory->barcode = $barcode[$i];
             $inventory->sn = $sn[$i];
             $inventory->notes = $notes[$i];
             $inventory->user_id_in = Auth::id();
             $inventory->save();

            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";

            echo $inventory;
            }
        // }
        
        //Session::flash('message', 'Added!');

         //$request for handling validation
        return view('operator.inventory.indexLogging');
        
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        //$id = Auth::user()->id;
        $inventory = Inventory::join('customers','customers.id','=','inventory.belong_to')
        // ->leftJoin('users','users.id','=','inventory.user_id_in')
        // ->leftJoin('users','users.id','=','inventory.user_id_out')
        ->select(array(
            'inventory.id',
            'inventory.barcode',
            'inventory.device',
            'inventory.sn_ori',
            'inventory.status as status',
            'customers.customer_name'
            ));

        return Datatables::of($inventory)
            // ->edit_column('admin', '@if ($admin=="1") Admin @else Operator @endif')
            ->edit_column('status', '@if ($status=="1") IN @else OUT @endif')
            ->add_column('action', '<a href="{{{ URL::to(\'operator/inventory/\' . $id . \'/edit\' ) }}}" class="btn btn-xs" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.view_edit") }}</a>')
            ->remove_column('id')
            ->make();
    }

}
