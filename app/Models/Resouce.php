<?php

namespace App\Models;

use App\Http\Controllers\ResouceController;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resouce extends Model
{
    use HasFactory;
    /**   * 需要被转换成日期的属性
     *  @var array   */
    protected $dates = ['deleted_at'];
    protected $table = "resouce";
    // 指定开启时间戳
    public $timestamps = true;
    // 指定主键
    protected $primaryKey = "u_id";
    // 指定不允许自动填充的字段，字段修改的黑名单
    protected $guarded = [];
    public static function find($ids){

        try{

            $data = Resouce::where('id',$ids)
                ->select('class','username','userposition','type','directiontype','title','content')
                ->get();
            return $data;
        }catch (Exception $e) {
            return 'error'.$e->getMessage();
        }
    }
    public static function Inquire($ids){
        $data = Resouce::find($ids)
            ->count();
        return $data;
    }
    public static function Deletes($ids){
        $data = Resouce::where('id',$ids)
            ->delete();
        return $data;

}
    public static function revise($request){
        $dataToUpdate = [
            'class' => $request->input('class'),
            'username' => $request->input('username'),
            'userposition' => $request->input('userposition'),
            'type' => $request->input('type'),
            'directiontype' => $request->input('directiontype'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),

        ];
        $data = Resouce::where('id', $request->input('id'))->update($dataToUpdate);
        return $data;
    }


}
