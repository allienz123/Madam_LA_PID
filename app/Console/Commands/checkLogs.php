<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Logs;
use Mail;
use Carbon\Carbon;


class checkLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check if there is any alarm or not and trying to send mail notification.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */     
    public function handle()
    {
        // Cek if there any respond or not
        $logs = Logs::where('alarm_logs.user_id','=', '3')
            ->where('alarm_logs.status','=','0')->get();

            foreach ($logs as $data) {
                
                $result   = array('name' => $data->customer_name, 'time' => $data->time_log);
                //if ($logs->isEmpty()){
                Mail::queue('emails.test', $result , function ($message) use ($data){
                // $message->subject('Blog Contact Form: '.$data['name'])
                    //$message->subject('Tes');
                    $date = Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s');
                    $message->subject('Madam Alarm Logger'.' : '.$data->customer_name.' @ '.$date);
                    $message->to('prasetyawidi.indrawan@lintasarta.co.id');       
                    });
           // }
        }
    }
}
