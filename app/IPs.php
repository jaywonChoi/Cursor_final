<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IPs extends Model
{
    //
    protected $fillable = [
      'report_date',
      'PV_num',
      'UU_num',
      'CVR_num'
    ];
    
}
