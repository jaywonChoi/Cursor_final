<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CursorController;
use Mail;
use Illuminate\Support\Facades\DB;

class cron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send ip report 10:00 AM';

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
        //
        CursorController::ip_read();
        CursorController::send_mail();
        //echo "string";
        // $timestamp = time();
        // if (date('N',$timestamp)=== '1') {
        //   $today = date("Y-m-d",strtotime("-3 days"));
        //
        // }
        // else {
        //   $today = date("Y-m-d",strtotime("-1 days"));
        //
        // }
        // //echo $today;
        // $report_ips = DB::table('i_ps')->where('created_at','like',$today.'%')->get();
        // foreach ($report_ips as $key => $value) {
        //   $report_date = $value->report_date;
        //   $PV_num = $value->PV_num;
        //   $UU_num = $value->UU_num;
        //   $CVR_num = $value->CVR_num;
        // }
        // $datas = array(
        //   'report_date' => $report_date,
        //   'PV_num'=>$PV_num,
        //   'UU_num'=>$UU_num,
        //   'CVR_num'=>$CVR_num
        // );
        // $mail_content="date:".$report_date."\n PV:".$PV_num."\n UU:".$UU_num."\n CVR:".$CVR_num;

        //https://teratail.com/questions/44794
        Mail::send('emails.cron_email',[],function($message){
          $message->from('jaychoi1231@gmail.com');
          $message->to('choi@estore.co.jp');
          $message->subject('アクセスレポート_チェジェウォン');

        });
        $this->info('success!');


    }
}
