<?php

namespace App\Http\Controllers;

use App\Models\Resouce;
use Illuminate\Http\Request;

class ResouceController extends Controller
{
    public function FindResouce(Request $request){
    $type = $request['type'];
    $directiontype = $request['directiontype'];
    $res = Resouce::FindResouce($type , $directiontype);
        if (is_error($res)){
            return json_fail('查询失败!',$res,100  ) ;
        }else{
            return json_success('查询成功!',$res,200  ) ;
        }
    }
    public function SearchResouce(Request $request){
        $content = $request['content'];
        $res = Resouce::SearchResouce($content);
        if (is_error($res)){
            return json_fail('查询失败!',$res,100  ) ;
        }else{
            return json_success('查询成功!',$res,200  ) ;
        }



    }

}
