<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = "notice";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];
    public static function findnotice(){
        try{
            $res = Notice::get();
            return $res;
        }catch (Exception $e) {
            return 'error'.$e->getMessage();
        }
    }
}
