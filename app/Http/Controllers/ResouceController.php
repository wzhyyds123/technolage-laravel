<?php

namespace App\Http\Controllers;

use App\Models\Resouce;
use Illuminate\Http\Request;

class ResouceController extends Controller
{
    //
    public function Find_Resouce(Request $request){
        $ids = $request->input('id');
        $data = Resouce::find($ids);
        if(is_error($data) == true){
            return json_fail('获取资源信息失败',$data,100);
        }else{
            return json_fail('获取资源信息成功',$data,200);
        }

    }
    public function Delete_Rsouce(Request $request){
        $ids = $request->input('id');
        $datb = Resouce::Inquire($ids);
        if($datb == 0 ){
            return json_fail('无该资源信息',$datb,100);
        }else{
            $data = Resouce::Deletes($ids);
            if(is_error($data) == true){
                return json_fail('删除资源信息失败',$data,100);
            }else{
                return json_fail('删除资源信息成功',$data,200);
            }


        }

    }
    public function revise_Rsouce(Request $request){
        $ids = $request->input('id');
        $datb = Resouce::Inquire($ids);
        if($datb == 0 ){
            return json_fail('无该资源信息',$datb,100);
        }else{
            $data = Resouce::revise($request);

            if(is_error($data) == true){
                return json_fail('修改资源信息失败',$data,100);
            }else{
                return json_fail('修改资源信息成功',$data,200);
            }

        }
    }
}
