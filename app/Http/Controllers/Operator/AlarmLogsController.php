<?php namespace App\Http\Controllers\Operator;

use App\Http\Controllers\OperatorController;
use App\Http\Requests\Operator\AlarmLoggerRequest;
use App\Logs;
use Mail;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Excel;
use Carbon\Carbon;

class AlarmLogsController extends OperatorController {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // $logs = Logs::where('alarm_logs.user_id','=', '13')
        //     ->where('alarm_logs.status','=','0')->get();
        // echo '<br/>';

        // Show the page
        return view('operator.logs.alarm');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getAck($id) {

        $logs = Logs::find($id);
        return view('operator.logs.ack', compact('logs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postAck(AlarmLoggerRequest $request, $id) {

        $logs = Logs::find($id);
        $logs -> user_id = Auth::id();
        $logs -> notes = $request->notes;
        $logs -> save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getView($id) {

        $logs = Logs::find($id);
        return view('operator.logs.view', compact('logs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postView(AlarmLoggerRequest $request, $id) {

        $logs = Logs::find($id);
        $logs -> user_id = Auth::id();
        $logs -> notes = $request->notes;
        $logs -> save();
    }

    /*
    This function is already put in app/Console/Commands/checkLogs.php
    */
    public function checkLogs(){
         $logs = Logs::where('alarm_logs.user_id','=', '13')
            ->where('alarm_logs.status','=','0')->get();

            foreach ($logs as $data) {
                $result   = array('name' => $data->customer_name, 'time' => $data->time_log);
                //if ($logs->isEmpty()){
                Mail::queue('emails.test', $result , function ($message) use ($data){
                // $message->subject('Blog Contact Form: '.$data['name'])
                    //$message->subject('Tes');
                    $message->subject('Madam Alarm Logger'.' : '.$data->customer_name.' @ '.$data->time_log);
                    $message->to('prasetyawidi.indrawan@lintasarta.co.id');       
                    });
           // }
        }
    }

     /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $logs = Logs::leftJoin('users','users.id','=','alarm_logs.user_id')
            ->select(array(
                'alarm_logs.id',
                'alarm_logs.terminal',
                'alarm_logs.customer_name', 
                'alarm_logs.time_log', 
                'alarm_logs.status as status',
                'users.username as pic'));
        return Datatables::of($logs)
            ->add_column('actions', '@if($pic=="")<a href="{{{ URL::to(\'operator/alarm/\' . $id . \'/ack\' ) }}}" class="btn btn-warning btn-xs iframe" ><span class="glyphicon glyphicon-alert"></span>  {{ trans("admin/modal.respond") }}</a> 
                @else <a href="{{{ URL::to(\'operator/alarm/\' . $id . \'/view\' ) }}}" class="btn btn-xs iframe"><span class="glyphicon glyphicon-thumbs-up fa-lg"></span> @endif')
            ->edit_column('status', '@if ($status=="1") Closed properly @else Open too long @endif')
            //->edit_column('pic', '@if ($pic=="1")  @else Open too long @endif')
            // ->filter(function ($query) {
            //             if (Input::get('name')) {
            //                 $query->where('customer_name', '=', Input::get('name'));
            //             }
            //         })
            ->remove_column('id')
            ->make();
    }

    public function exportExcel() 
    {
        $date = Carbon::now('Asia/Jakarta')->format('d_m_Y');
        //Set excel title
        Excel::create('AlarmLogsDC'.'_'. $date, function($excel) {
        //First sheet
        $excel->sheet('Alarm Logs', function($sheet) {

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

        $sheet->row(2, array('No.','Terminal','Customer Name','Time Log', 'PIC', 'Notes'));
        //Make freeze view
        $sheet->setFreeze('A3');

        $logs = Logs::leftJoin('users','users.id','=','alarm_logs.user_id')
         ->select(array(
                'alarm_logs.id',
                'alarm_logs.terminal',
                'alarm_logs.customer_name', 
                'alarm_logs.time_log', 
                'alarm_logs.status',
                'alarm_logs.notes as notes',
                'users.username as pic'))->where('status','=','0')->get();

         
        // putting users data as next rows
        $number=1;
        foreach ($logs as $logs) 
        {
            $sheet->appendRow(array($number,$logs->terminal,$logs->customer_name,$logs->time_log,$logs->pic,$logs->notes));
            $number++;
        }

         }); //End of sheet
        //End of excel
        })->export('xlsx');
    }


}