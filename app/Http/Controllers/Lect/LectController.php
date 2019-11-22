<?php

namespace App\Http\Controllers\Lect;

use Illuminate\Http\Request;
use App\Model\Lect;
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
}