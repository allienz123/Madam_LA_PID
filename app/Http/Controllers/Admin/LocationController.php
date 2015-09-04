<?php namespace App\Http\Controllers\Admin;

use App\DcLocation;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use App\Http\Requests\Admin\LocationRequest;
use Illuminate\Support\Facades\Auth;    
use Datatables;

class LocationController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Show the page
        return view('admin.location.index');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
       // Show the page
        return view('admin.location.create_edit');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(LocationRequest $request) {

        $location = new DcLocation();
        $location -> location_name = $request->location_name;
        $location -> save();
    }

    public function getDelete($id)
    {
        $location = $id;
        // Show the page
        return view('admin.location.delete', compact('location'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $location = DcLocation::find($id);
        $location->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $location = DCLocation::whereNull('deleted_at')
        ->select(array('id','location_name', 'created_at', 'updated_at'));
        return Datatables::of($location)
        ->add_column('Actions', '<a href="{{{ URL::to(\'admin/location/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe"><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a> <a href="{{{ URL::to(\'admin/location/\' . $id . \'/delete\' ) }}}" class="btn btn-success btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>')
        ->remove_column('updated_at')
        ->make();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($id) {

        $location = DcLocation::find($id);
        return view('admin.location.create_edit', compact('location'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */ 
    public function postEdit(LocationRequest $request, $id) {

        $location = DcLocation::find($id);
        $location -> location_name = $request->location_name;
        $location -> save();
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
                DcLocation::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}
