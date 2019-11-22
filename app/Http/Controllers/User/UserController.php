<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Users;
use App\model\Userinfo;

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

            $date =Userinfo::insert([
                'u_id' => $res,
                'user_time'=>time()
            ]);
            if($date){
//                dd(111);
                echo "<script>alert('添加成功');location='/userList';</script>";
            }
        }else{
            echo "<script>alert('添加失败');location.href='/userAdd';</script>";
        }
    }



//    public function userCreate()
//    {
//
//        return view('user.userCreate');
//    }
//
//    public function userSave(Request $request)
//    {
//
//        $data = $request->all();
////        dd($data);
//        $res =Userinfo::insert([
//            'user_head' => $data['user_head'],
//            'user_age' => $data['user_age'],
//            'user_sex' => $data['user_sex'],
//            'user_time'=>time()
//        ]);
////        dd($res);
//        if ($res) {
//            echo "<script>alert('添加成功');location.href='/user/userList';</script>";
//        } else {
//            echo "<script>alert('添加失败');location.href='/user/userCreate';</script>";
//
//        }
//    }

    public function userList(Request $request)
    {
        $data =Users::get();
        return view('user.userList',['data' => $data]);
    }

    public function userIndex(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
        $user =Userinfo::join('user','user.u_id','=','user_info.u_id')->where('user.u_id',$id)->get();
//        dd($user);
        return view('user.userIndex',['user'=>$user]);
    }
}
