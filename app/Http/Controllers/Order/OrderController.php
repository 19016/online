<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Order;
class OrderController extends Controller
{
    public function order_list()
    {
        $data=Order::join('user_info','order.u_id','=','user_info.u_id')
            ->join('course','order.course_id','=','course.course_id')
            ->paginate(15);
//        dd($data);
        return view("order.list",['data'=>$data]);
    }
}
