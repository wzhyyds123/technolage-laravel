<?php

namespace App\Http\Controllers;

use App\Models\Resouce;
use Illuminate\Http\Request;


class ResouceController extends Controller
{
    public function FindResouce(){
        $res = Resouce::FindResouce();
        if(is_error($res)){
            return json_fail('查询失败！',$res,100);
        }else{
            return json_success('查询成功!',$res,200);
        }
    }

    public function tzlapdate(Request $request){
        $id = $request['id'];
        $url = $request['url'];
        $username = $request['username'];
        $class = $request['class'];
        $userposition = $request['userposition'];
        $type = $request['type'];
        $directionType = $request['directiontype'];
        $title = $request['title'];
        $content = $request['content'];
        $res = Resouce::tzl_apdate($id,$url,$username,$class,$userposition,$type,$directionType,$title,$content);
        return $res?
            json_success('更新成功!',$res,200):
            json_fail('更新失败！',$res,100);
    }


    public function tzldelete(Request $request){
        $id = $request['id'];
        $res = Resouce::tzl_delete($id);
        return $res?
            json_success('删除成功!',$res,200):
            json_fail('删除失败！',$res,100);
    }

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
