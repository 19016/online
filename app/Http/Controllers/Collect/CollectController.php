<?php

namespace App\Http\Controllers\collect;

use App\Model\Collect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    /** 收藏展示 */
    public function collectList(){
        $collect_sql = Collect::join('course','collect.course_id','=','course.course_id')
        ->join('user','collect.u_id','=','user.u_id')
        ->join('favorite','collect.f_id','=','favorite.f_id')
        ->get()
        ->toArray();

        return view('collect.collectList',['collect'=>$collect_sql]);
    }
}
