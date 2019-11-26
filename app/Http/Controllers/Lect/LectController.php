<?php

namespace App\Http\Controllers\Lect;

use Illuminate\Http\Request;
use App\Model\Lect;
use App\Model\Profit;
use App\Http\Controllers\Controller;

class LectController extends Controller
{
    public function lectAdd(){

        return view('lect.lectAdd');
    }
    public function lectAdddo(Request $request){
        // echo 123;die;
        $all=$request->all();
        // dd($all);
        $res = Lect::insert($all);
        if ($res) {
            echo "<script>alert('添加成功');location.href='/lectList'</script>";
        } else {
            echo "<script>alert('添加失败');location.href='/lectAdd'</script>";
        }
    }
    public function lectList(){
        $where=[
            'is_del'=>0
        ];
        $data=Lect::where($where)->get()->toArray();
        //dd ($data);
        return view('lect.lectList',['data'=>$data]);
    }
    public function lectUpd(Request $request){
        $id=$request->id();
        dd ($id);
        return view('lect.lectUpd',['data'=>$data]);
    }
    public function lectDel(Request $request){
        $id=$request->id;
        $where=[
            'lect_id'=>$id
        ];
        $data=Lect::where($where)->update(['is_del'=>1]);
        if ($data) {
            echo "<script>alert('删除成功');location.href='/lectList'</script>";
        } else {
            echo "<script>alert('删除失败');location.href='/lectList'</script>";
        }
    }
    public function lectClass(Request $request){
        $id=$request->id;
        $where=[
            'lect.lect_id'=>$id,
            'course.is_del'=>0
        ];
        $data=Lect::
        join('course','lect.lect_id','=','course.lect_id')
        ->where($where)
        ->get()
        ->toArray();
        // dd($data);
        return view('lect.lectClass',['data'=>$data]);
    }
    public function lectprofit(Request $request){
        $id=$request->id;
        // dd($id);
        $where=[
            'profit.lect_id'=>$id,
            'lect.is_del'=>0
        ];
        $data=Profit::
        join('lect','lect.lect_id','=','profit.lect_id')
        ->where($where)
        ->get()
        ->toArray();
        return view('lect.lectprofit',['data'=>$data]);
    }
}