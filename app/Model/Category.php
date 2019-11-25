<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $primaryKey='cate_id';
    public $timestamps=false;
    protected $guarded=[];

    public  static function createTree($data,$pid=0,$level=0)
    {
//        echo  111;exit;
        if (!$data || !is_array($data)) {
            return;
        }
        static $arr=[];
        foreach ($data as $k=>$v){
            //dd($v);
            if ($v['pid']==$pid){
                $v['level']=$level;
                $arr[]=$v;
                self::createTree($data,$v['cate_id'],$level+1);
            }
        }
        return $arr;
    }

}





































