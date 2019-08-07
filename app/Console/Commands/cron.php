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
        //CursorController::ip_read();
        //echo "string";
        $timestamp = time();
        if (date('N',$timestamp)=== '1') {
          $today = date("Y-m-d",strtotime("-3 days"));

        }
        else {
          $today = date("Y-m-d",strtotime("-1 days"));

        }
        //echo $today;
        $report_ips = DB::table('i_ps')->where('created_at','like',$today.'%')->get();
        foreach ($report_ips as $key => $value) {
          $report_date = $value->report_date;
          $PV_num = $value->PV_num;
          $UU_num = $value->UU_num;
          $CVR_num = $value->CVR_num;
        }
        //echo $report_date;
      //  echo $PV_num;
      //  echo $UU_num;
      //  echo $CVR_num."%";
  


    }
}
