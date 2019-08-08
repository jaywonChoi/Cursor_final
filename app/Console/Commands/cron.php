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
        CursorController::send_mail_form();

        Mail::send('emails.cron_email',[],function($message){
          $message->from('jaychoi1231@gmail.com');
          $message->to('choi@estore.co.jp');
          $message->subject('IPアクセスレポート_チェジェウォン');

        });
        $this->info('success!');


    }
}
