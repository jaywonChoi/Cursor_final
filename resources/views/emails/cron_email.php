<?php
  $timestamp = time();

    $today = date("Y-m-d");
    $week = ['日','月','火','水','木','金','土'];
  //echo $today;
  $data = DB::table('i_ps')->where('created_at','like',$today.'%')->get();
  foreach ($data as $key => $value){
    $reg_date = date('Y年m月d日',strtotime($value->report_date));
    $week_reg_date = date('w',strtotime($value->report_date));
    $PV= $value->PV_num;
    $UU = $value->UU_num;
    $CVR= $value->CVR_num;
    $create_date =date('Y年m月d日',strtotime($value->created_at));
    $week_create_date =date('w',strtotime($value->created_at));
  }
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>IP_report</title>
  </head>
  <body>
    <div>
          <div>
            <p>お疲れさまです。チェジェウォンです。</p>
            <div style="border:1px solid; padding:10px;width:450px">
              <b>※<?=$create_date ?><?=$week[$week_create_date]?>曜日のレポートをお送りいたします。</b>
              <p>レポート対象の年月日: <?= $reg_date  ?><?=$week[$week_reg_date]?>曜日</p>
              <p>ユーザーのアクセス数（PV数）: <?= $PV  ?></p>
              <p>ユニークユーザーの数（UU数）: <?= $UU  ?></p>
              <p>コンバージョンレートの％（CVR数）: <?= $CVR  ?>%</p>
            </div>
          </div>
    </div>

  </body>
</html>
