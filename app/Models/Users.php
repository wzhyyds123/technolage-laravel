<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // 引入 Authenticatable 类
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Users extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = "users";
    protected $fillable = [
        'email', 'password', 'username', 'class', 'position'
    ];

    /**
     * 获取会存储到 jwt 声明中的标识
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * 返回包含要添加到 jwt 声明中的自定义键值对数组
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return ["role" => "users"];
    }

    /**
     * 查询该工号是否已经注册
     * @param $request
     * @return false
     */
    public static function checknumber($email)
    {
        try {
            $count = Users::select('email')
                ->where('email', $email)
                ->count();
            return $count;
        } catch (Exception $e) {
            return 'error' . $e->getMessage();
        }
    }

    /**
     * @param $account
     * @return false|void
     */
    public static function createUser($registeredInfo)
    {
        try {
            $user_id = Users::create([
                'email' => $registeredInfo['email'],
                'username' => $registeredInfo['username'],
                'class' => $registeredInfo['class'],
                'position' => $registeredInfo['position'],
                'password' => $registeredInfo['password']
            ])->id;
            return $user_id;
        } catch (Exception $e) {
            return 'error' . $e->getMessage();
        }
    }
}
