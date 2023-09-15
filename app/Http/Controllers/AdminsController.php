<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**

     * 加密数据（值得注意的是，本方法因为无需密码登录，故而获取的psw和account一致）
     * @param $request
     * @return array
     */
    protected function AdminsHandle($request): array   //对密码进行哈希256加密
    {
        $registeredInfo['account'] = $request['account'];
        $registeredInfo['password'] = $request['password'];
        $registeredInfo['password'] = bcrypt($registeredInfo['password']);
        return $registeredInfo;
    }

    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adminLogin(Request $request): JsonResponse
    {
        $credentials['account'] = $request['account'];
        $credentials['password'] = $request['password'];
        $token = auth('admin')->attempt($credentials);
        return $token?
            json_success('登录成功!',$token,  200):
            json_fail('登录失败!账号或密码错误',null, 100 ) ;
    }

    /**
     * 注册录入数据
     * @param Request $request
     * @return JsonResponse
     */
    public function adminRegister(Request $request): JsonResponse
    {
        $registeredInfo = self::AdminsHandle($request);
        $count = Admins::checkNumber($registeredInfo['account']);   //检测账号是否存在
        if (is_error($count)){
            return json_fail('注册失败!检测是否存在的时候出错啦',$count,100  ) ;
        }
        if ($count == 0){
            $student_id = Admins::createAdmins($registeredInfo);
            if (is_error($student_id)){
                return json_fail('注册失败!添加数据的时候有问题',$student_id,100  ) ;
            }
            return json_success('注册成功!',$student_id,200  ) ;
        }
        return json_fail('注册失败!该用户信息已经被注册过了',null,101 ) ;
    }

    /**
     * 退出登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return  json_success('用户退出登录成功!',null,  200);
    }

    /**
     * 刷新token
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $token = auth('api')->refresh();
        return  json_success('token刷新成功!',$token, 200);
    }
}
