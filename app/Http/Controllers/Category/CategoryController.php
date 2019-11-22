<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Category;
use DB;

class CategoryController extends Controller
{
    public  function categoryAdd()
    {
//       echo  111;exit;
        $res = Category::get()->toArray();
//       dd($res);
        $cate = Category::createTree($res);
    //    dd($cate);
        return view('category.categoryAdd',compact('cate'));
    }


    public function categoryAdddo(Request $request)
    {
//       echo 111;exit;
        $data = $request->all();
//            dd($data);
        $date=$data['cate_name'];
//        dd($date);
        $result=Category::where(['cate_name'=>$date])->first();
//        dd($result);
        if($result){
            echo "<script>alert('分类名称已存在');location.href='/categoryAdd';</script>";
            return;
        }
        $res = Category::insert($data);
//            dd($res);
        if ($res){
            echo "<script>alert('添加成功');location.href='/categoryList';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/categoryAdd'</script>";
        }
    }


    public function categoryList()
    {
        $where=[
            'is_del'=>0
        ];
        $data=Category::where($where)->get()->toArray();
        // dd($data);
        $data=Category::createTree($data);
    //    dd($data);
        return view('category.categoryList',['data'=>$data]);
    }

    public function categoryDel(Request $request)
    {
        $id=$request->input('id');
    //    dd($id);
        $data=Category::where(['pid'=>$id])->get()->toArray();
        //dd($data);
        if($data==[]){
            $res=Category::where(['cate_id'=>$id])->update(['is_del'=>1]);
        }else{
            echo "<script>alert('此分类下有子类');location.href='/categoryList';</script>";
        }
        //dd($res);
        //判断
        if ($res){
            echo "<script>alert('删除成功');location.href='/categoryList';</script>";
        }else{
            echo "<script>alert('删除失败');location.href='/categoryList'</script>";
        }
    }

    //修改
    public function categoryUpd(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
        $data=Category::where(['cate_id'=>$id])->first()->toArray();
        $cateinfo = Category::get()->toArray();
    //    dd($data);
        $cateinfo=Category::createTree($cateinfo);
//        dd($cateinfo);
        return view('category.categoryUpd',['data'=>$data,'cateinfo'=>$cateinfo]);
    }

    public function categoryUpddo(Request $request)
    {
        //接id
        $data=$request->all();
    //    dd($data);
        $res=Category::where('cate_id',$data['cate_id'])->update([
            'cate_name'=>$data['cate_name'],
            'pid'=>$data['pid']
        ]);
//        dd($res);
        //判断
        if($res){
           return json_encode(['content'=>'修改成功','code'=>'1']);
        }else{
            return json_encode(['content'=>'修改失败','code'=>'2']);
        }
    }

}
