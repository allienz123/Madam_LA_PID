<?php namespace App\Http\Controllers\Admin;

use App\ServiceType;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use App\Http\Requests\Admin\ServiceTypeRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class ServiceTypeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Show the page
        return view('admin.servicetype.index');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
       // Show the page
        return view('admin.servicetype.create_edit');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(ServiceTypeRequest $request) {

        $service = new ServiceType ();
        $service -> user_id = Auth::id();
        //Validation
        $service -> service_name = $request->service_name;
        $service -> it_services = $request->it_services;
        $service -> save();
    }

    public function getDelete($id)
    {
        $service = $id;
        // Show the page
        return view('admin.servicetype.delete', compact('service'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $service = ServiceType::find($id);
        $service->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $service = ServiceType::select(array('id','service_name', 'it_services', 'created_at'));
        //$services = ServiceType::select('it_services');
        return Datatables::of($service)
        ->edit_column('it_services', '@if($it_services){{ trans("admin/admin.it_services") }} @else {{ trans("admin/admin.datacom") }} @endif')
        ->add_column('Actions', '<a href="{{{ URL::to(\'admin/servicetype/\' . $id . \'/delete\' ) }}}"class="btn btn-success btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>')
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
                ServiceType::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}
