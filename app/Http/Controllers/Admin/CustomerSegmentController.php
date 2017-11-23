<?php namespace App\Http\Controllers\Admin;

use App\CustomersSegment;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use App\Http\Requests\Admin\SegmentRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class CustomerSegmentController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Show the page
        return view('admin.customerssegment.index');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
       // Show the page
        return view('admin.customerssegment.create_edit');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(SegmentRequest $request) {

        $segment = new CustomersSegment ();
        $segment -> user_id = Auth::id();
        $segment -> segment_name = $request->segment_name;
        $segment -> save();
    }

    public function getDelete($id)
    {
        $segment = $id;
        // Show the page
        return view('admin.customerssegment.delete', compact('segment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $segment = CustomersSegment::find($id);
        $segment->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $segment = CustomersSegment::whereNull('deleted_at')
        ->select(array('id','segment_name', 'created_at', 'updated_at'));
        return Datatables::of($segment)
        ->add_column('Actions', '<a href="{{{ URL::to(\'admin/customerssegment/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>')
        ->remove_column('updated_at','id')
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
                CustomersSegment::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

}
