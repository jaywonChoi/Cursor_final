<?php
  $timestamp = time();

    $today = date("Y-m-d");

  //echo $today;
  $data = DB::table('i_ps')->where('created_at','like',$today.'%')->get();


 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div>

        <?php foreach ($data as $key => $value):
          $reg_date = $value->report_date;
          $PV= $value->PV_num;
          $UU = $value->UU_num;
          $CVR= $value->CVR_num;
          $create_date =date('Y-m-d',strtotime($value->created_at));
          ?>
          <div>
            <b><?=$create_date ?>のレポートをお送りします。</b>
           <p>レポート対象の年月日: <?= $reg_date  ?></p>
           <p>ユーザーのアクセス数（PV数）: <?= $PV  ?></p>
           <p>ユニークユーザーの数（UU数）: <?= $UU  ?></p>
           <p>コンバージョンレートの％（CVR数）: <?= $CVR  ?>%</p>

          </div>
        <?php endforeach; ?>



    </div>

  </body>
</html>
