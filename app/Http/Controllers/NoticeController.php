<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
   public function FindNotice(){
       $res = Notice::findnotice();
       if (is_error($res)){
           return json_fail('查询失败!',$res,100  ) ;
       }else{
           return json_success('查询成功!',$res,200  ) ;
       }
   }
}
