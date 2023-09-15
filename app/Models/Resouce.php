<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Resouce extends Model
{
    protected $table = "resouce";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];


    public static function FindResouce(){
        try {
            $res = Resouce::get();
            //查询 Resouce::where()->get();


            //添加 xx::create([
            //  xxx => $xxx,
            //  xxx => $xxx
            //])

            //xx::where('xxx',$xxx)->update([
            //  xxx => $xxx,
            //  xxx => $xxx
            //])

            //xxx::where('id',1)->delete();

            //xxx::join('x','x.id','y.id')

            return $res;
        }catch (\Exception $e){
            return 'error'.$e->getMessage();
        }
    }


    public static function tzl_apdate($id,$url,$username,$class,$userposition,$type,$directionType,$title,$content){
        try {
            $date = Resouce::where('id',$id)->update([
                'url' =>$url,
                'username'=>$username,
                'class' => $class,
                'userposition'=>$userposition,
                'type'=>$type,
                'directiontype'=>$directionType,
                'title' => $title,
                'content' =>$content
            ]);
            return $date;
        }catch (\Exception $e){
            logError('操作失败',[$e->getMessage()]);

    public static function FindResouce($type , $directiontype){
        try{
           $res = Resouce::where('type','=',$type)->where('directiontype','=',$directiontype)->get();
            return $res;
        }catch (Exception $e) {
            return 'error'.$e->getMessage();
        }
    }
    public static function SearchResouce($content){
        try{
            $res=Resouce::where('content','like','%'.$content.'%')->get();
            return $res;
        }catch (Exception $e) {

            return 'error'.$e->getMessage();
        }
    }

    public static function tzl_delete($id){
        try {
            $date = Resouce::where('id',$id)->delete();
            return $date;
        }catch (\Exception $e){
            logError('操作失败',[$e->getMessage()]);
            return 'error'.$e->getMessage();
        }
    }

}

