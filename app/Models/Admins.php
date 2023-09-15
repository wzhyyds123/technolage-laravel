<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // 引入 Authenticatable 类
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admins extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = "admins";
    protected $fillable = [
        'account', 'password'
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
        return ["role" => "admins"];
    }

    /**
     * 查询该工号是否已经注册
     * @param $request
     * @return false
     */
    public static function checkNumber($account)
    {
        try {
            $count = Admins::select('account')
                ->where('account', $account)
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
    public static function createAdmins($registeredInfo)
    {
        try {
            return Admins::create([
                'account' => $registeredInfo['account'],
                'password' => $registeredInfo['password']
            ])->id;
        } catch (Exception $e) {
            return 'error' . $e->getMessage();
        }
    }
}
