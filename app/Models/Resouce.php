<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resouce extends Model
{
    protected $table = "resouce";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

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

}

