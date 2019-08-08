<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
use App\IPs;




class CursorController extends Controller
{
    //
    public function index()
    {
      ///////////////////////////////////////////////////
      $products = Product::orderBy('updated_at','desc');
      $products = Product::all()->take(4);
      return view('Cursor',compact('products'));
    }

    public function show($pid)
    {
      //detail product show
      $product = Product::findOrFail($pid);
      $like = Product::where('pid','!=',$pid)->alsolike()->get();

      //dd($product);
      return view('detail',compact('product'))->with('like',$like);
    }

    //shoppage
    public function shop()
    {
      // code...
      //
      $products = Product::orderBy('created_at','desc');
      $products = Product::all();
      return view('shop',compact('products'));
    }

     public static function ip_read()
    {
      $put_ips_info = new IPs();

      $timestamp = time();
      if (date('N',$timestamp)=== '1') {
        $today = date("Y-m-d",strtotime("-3 days"));
        //echo "Today is report:".$today;
        $put_ips_info->report_date = $today;
        //echo "<br />";

      }
      else {
        $today = date("Y-m-d",strtotime("-1 days"));
        //echo "Today is report:".$today;
        $put_ips_info->report_date = $today;
        //echo "<br />";

      }

      $get_ip = file('/etc/httpd/logs/access_log.'.$today,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
      $log_put_arr = array();
      foreach ($get_ip as $key => $get_ips) {
        preg_match('/^(\S+)/',$get_ips, $matches);
        array_push($log_put_arr,$matches[0]);

        }

        $PV= count($log_put_arr);
        $put_ips_info->PV_num = $PV;
        $ip_unique = array_unique($log_put_arr);
        $UU= count($ip_unique);
        $put_ips_info->UU_num =$UU;

         $orders = DB::table('orders')
        ->select(DB::raw('count(id) as order_count'))
        ->where('created_at','like',$today.'%')->get();

        $order_count= $orders[0]->order_count;
        $CVR = round($order_count/$PV*100,2);
        $put_ips_info->CVR_num=$CVR;

        $put_ips_info->save();

    }
    public static function send_mail_form()
    {

      return view('emails/cron_email');

    }




}
