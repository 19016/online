<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\model\Users;
use App\model\Userinfo;
use App\Model\Favorite;
use App\Model\Collect;
use App\Model\Orders;
use App\Model\Lect;
class UserController extends Controller
{
    public function userAdd()
    {
        return view('user.userAdd');
    }

    public function userAddo(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $res=Users::insertGetId([
            'u_name'=>$data['u_name'],
            'u_pwd'=>$data['u_pwd'],
            'u_email'=>$data['u_email'],
        ]);
//        dd($res);
        if ($res){
            echo "<script>alert('添加成功');location='/userCreate';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/userAdd';</script>";
        }
    }


    public function userList(Request $request)
    {
        $data =Users::get();
        return view('user.userList',['data' => $data]);
    }



    public function userCreate()
    {
        return view('user.userCreate');
    }

    public function userSave(Request $request)
    {
        $data=$request->all();
//        dd($data);
        $file = $request->file('file');
//        dd($file);
        if(empty($file)){
            echo "<script>alert('图片不能为空');history.go(-1)</script>";die;
        }
        $time = date('Y-n-j');
        $path = $request->file('file')->store($time);
//        dd($path);
        $slide =Userinfo::insert([
            'user_head' => 'tupian'.'/'.$path,
            'user_age' =>$data['user_age'],
            'user_sex' =>$data['user_sex'],
            'user_time'=>time()
        ]);
//        dd($slide);
        if($slide){
            echo "<script>alert('添加成功');location='/userList';</script>";die;
        }else{
            echo "<script>alert('添加失败');location='/userCreate';</script>";die;
        }
    }

    public function userIndex(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
        $user =Userinfo::join('user','user.u_id','=','user_info.u_id')->where('user.u_id',$id)->get();
//        dd($user);
        return view('user.userIndex',['user'=>$user]);
    }

    //用户下面的收藏
    public function userFavorite(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
       $data=Collect::join('favorite','collect.f_id','=','favorite.f_id')
           ->join('course','collect.course_id','=','course.course_id')
           ->where('collect.u_id',$id)
           ->get();
//        dd($data);
        return view('user.userFavorite',['data'=>$data]);
    }

    //用户下面的订单
    public function userOrder(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
        $order=Orders::join('order','order.order_id','=','order_to.order_id')
            ->join('course','order_to.course_id','=','course.course_id')
            ->where('order.u_id',$id)
            ->get();
//        dd($data);
        return view('user.userOrder',['order'=>$order]);
    }

    //禁用启用
    public function useron(Request $request)
    {
        $post = request()->all();
        //dd($post);
        if (empty($post['u_id'])) {
            return json_encode(['code'=>1,'msg'=>'参数id不能为空!']);
        }else{
            $data =Userinfo::where(['u_id'=>$post['u_id']])->update(['user_status'=>$post['user_status']]);
        }
    }

    //用户升级为讲师
    public function userLect(Request $request)
    {
        $id=$request->id;
//        dd($id);
        $data=Userinfo::where(['u_id'=>$id])->update(['user_lect'=>2]);
//        dd($data);
        if($data){
            echo "<script>alert('正在审核');location='/userIndex?id='+$id;</script>";
        }

    }



    public function userLects(Request $request)
    {
        $id=$request->id;
//        dd($id);
        $data=Userinfo::where(['u_id'=>$id])->update(['user_lect'=>3]);
//        dd($data);
        if($data){
            echo "<script>alert('ok');location='/userIndex?id='+$id;</script>";
        }

    }


    public function userLectd(Request $request)
    {
        $id=$request->id;
//        dd($id);
        $data=Userinfo::where(['u_id'=>$id])->update(['user_lect'=>1]);
//        dd($data);
        if($data){
            echo "<script>alert('ok');location='/userIndex?id='+$id;</script>";
        }

    }
}
