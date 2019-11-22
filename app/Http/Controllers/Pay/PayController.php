<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Http\Request;
use App\Model\Pay;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    public function payAdd(){

        return view('pay.payAdd');
    }
    public function payAdddo(Request $request){
        // echo 123;die;
        $all=$request->all();
        // dd($all);
        $res = Pay::insert($all);
        if ($res) {
            echo "<script>alert('添加成功');location.href='/payList'</script>";
        } else {
            echo "<script>alert('添加失败');location.href='/payAdd'</script>";
        }
    }
    public function payList(){
        // $where=[
        //     'is_del'=>0
        // ];
        // where($where)->
        $data=Pay::get()->toArray();
        //dd ($data);
        return view('pay.payList',['data'=>$data]);
    }
    public function payUpd(Request $request){
        $id=$request->id();
        //dd ($id);
        return view('pay.payUpd',['data'=>$data]);
    }
    public function payDel(Request $request){
        $id=$request->id;
        $where=[
            'pay_id'=>$id
        ];
        $data=Collect::where($where)->update(['is_del'=>1]);
        if ($data) {
            echo "<script>alert('删除成功');location.href='/payList'</script>";
        } else {
            echo "<script>alert('删除失败');location.href='/payList'</script>";
        }
    }
}