<?php

namespace App\Http\Controllers;




class UsersController extends Controller
{

use App\Models\Users;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * 加密数据（值得注意的是，本方法因为无需密码登录，故而获取的psw和email一致）
     * @param $request
     * @return array
     */
    protected function userHandle($request): array   //对密码进行哈希256加密
    {
        $registeredInfo['email'] = $request['email'];
        $registeredInfo['username'] = $request['username'];
        $registeredInfo['class'] = $request['class'];
        $registeredInfo['position'] = $request['position'];
        $registeredInfo['password'] = $request['password'];
        $registeredInfo['password'] = bcrypt($registeredInfo['password']);
        return $registeredInfo;
    }

    /**
     * 注册录入数据
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $registeredInfo = self::userHandle($request);
        $count = Users::checknumber($registeredInfo['email']);   //检测账号是否存在
        if (is_error($count)){
            return json_fail('注册失败!检测是否存在的时候出错啦',$count,100  ) ;
        }
        if ($count == 0){
            $student_id = Users::createUser($registeredInfo);
            if (is_error($student_id)){
                return json_fail('注册失败!添加数据的时候有问题',$student_id,100  ) ;
            }
            return json_success('注册成功!',$student_id,200  ) ;
        }
        return json_fail('注册失败!该用户信息已经被注册过了',null,101 ) ;
    }

    /**
     * 登录
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $credentials['email'] = $request['email'];
        $credentials['password'] = $request['password'];
        $token = auth('api')->attempt($credentials);
        return $token?
            json_success('登录成功!',$token,  200):
            json_fail('登录失败!账号或密码错误',null, 100 ) ;
    }

    /**
     * 退出登录
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return  json_success('用户退出登录成功!',null,  200);
    }

    /**
     * 刷新token
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $token = auth('api')->refresh();
        return  json_success('token刷新成功!',$token, 200);
    }

}
