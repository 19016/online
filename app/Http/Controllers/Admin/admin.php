<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Users;
class admin extends Controller
{


    public function Index()
    {
        return view('admin1.login');
    }

    /**
     * 管理员登录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function login()
    {
        return view('admin/login');
    }

    public function login_denglu(Request $request)
    {
        $data = $request->input();
    //    dd($data);
        $admin = DB::table('admin')->where('admin_name','=',$data['u_name'])->first();
        //dd($admin);
        if (!$admin){
            return json_encode(['code'=>'201','msg'=>'用户名输入错误, 请重新输入']);
        }
    //    dd($admin);
        $admin = DB::table('admin')->where([['password','=',$data['u_password']],['admin_name','=',$data['u_name']]])->first();
        if(!$admin){
            return json_encode(['code'=>'202','msg'=>'密码输入错误, 请重新输入']);
        }
   //     dd($admin);
        $request->session()->flush();
        $request->session()->put('admin', $admin);
        $admin_roel = DB::table('admin_role')->where('admin_id',$admin->admin_id)->first();
        if(!$admin_roel){
            dd('只有查看权限');
        }
        $quanxian = DB::table('role_right')->join('right','role_right.right_id','=','right.right_id')->where('role_right.role_id',$admin_roel->role_id)->get()->toArray();
//        dd($quanxian);
        if($quanxian){
            $sess_id = $admin->admin_name.$admin->admin_id;
            $request->session()->put("$sess_id", $quanxian);
//                    dd($request->session()->all());
            return json_encode(['code'=>200,'msg'=>'登录成功']);
        }
    }
    /**
     * 管理员展示
     */
    public function admin()
    {
    //    dd(1);
       $admin = DB::table('admin')->get()->toArray();
    //   dd($admin);
        return view('admin/admin',['admin'=>$admin]);
    }
    /**
     * 管理员添加
     */
    public function admin_insert(Request $request)
    {
            $right_id = $request->input('right_id');
            return view('admin/admin_insert',['right_id'=>$right_id]);
    }

    public function admin_submit(Request $request)
    {
        $data = $request->input();
//        dd($data);
        $admin = DB::table('admin')->insert([
            'admin_name' => $data['admin_name'],
            'password' => $data['password'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'create_time' => time()
        ]);
        if ($admin){
            echo "<script>alert('管理员添加成功');location='/admin'</script>";die;
        }else{
            echo "<script>alert('添加失败,请重新添加');location='/admin'</script>";die;
        }
    }
    /**
     * 管理员角色设置
     */
    public function admin_set(Request $request , $admin_id)
    {
        $right_id = $request->input('right_id');
        $role = DB::table('role')->get()->toArray();
        return view('admin/admin_set',['right_id'=>$right_id,'admin_id'=>$admin_id,'role'=>$role]);
    }

    public function admin_role_insert(Request $request )
    {
        $quanxian = $request->input('quanxian');
        $admin_id = $request->input('admin_id');
        foreach($quanxian as $v){
//            echo $v;
            $admin_role = DB::table('admin_role')->insert([
               'admin_id' => $admin_id,
                'role_id' => $v
            ]);
        }
        echo "<script>alert('权限设置成功');location='/admin'</script>";die;
    }
    /**
     * 管理员删除
     */
    public function admin_delete(Request $request , $admin_id)
    {
        if($admin_id == 1){
            echo "<script>alert('超级管理员无权删除');location='/admin'</script>";die;
        }
        $admin_role_id = DB::table('admin_role')->where('admin_id',$admin_id)->get()->toArray();
        if (!$admin_role_id){
            DB::table('admin')->where('admin_id','=',$admin_id)->delete();
            echo "<script>alert('管理员删除成功');location='/admin'</script>";die;
        }
            DB::table('admin')->where('admin_id','=',$admin_id)->delete();
            DB::table('admin_role')->where('admin_id','=',$admin_id)->delete();
            echo "<script>alert('管理员 , 删除成功');;window.history.go(-1)</script>";die;
    }

    /**
     * 管理员密码修改
     */
    public function admin_update(Request $request)
    {
        $admin_id = $request->input('admin_id');
        $admin = $request->session()->get('admin');
        if($admin_id == $admin->admin_id){
            return view('admin/admin_update',['admin_id'=>$admin_id]);
        }else{
            echo "<script>alert('您无权操作,请联系管理员本人进行操作');window.history.go(-1)</script>";die;
        }
    }

    public function admin_update_add(Request $request)
    {
        $data = $request->input();
//        dd($data['admin_id']);
        $admin = DB::table('admin')->where('admin_id',$data['admin_id'])->first();
//        dd($admin);
//        $admin = $request->session()->get('admin');
        if($data['password'] == $admin->password){
            echo "<script>alert('密码重复 , 请输入与原密码不相同的密码');window.history.go(-1)</script>";die;
        }
        $admin_update = DB::table('admin')->where('admin_id',$data['admin_id'])->update(['password'=>$data['password']]);
        if($admin_update){
            $request->session()->flush();
            echo "<script>alert('密码修改成功 , 请去重新登录');location='/login'</script>";die;
        }else{
            echo "<script>alert('密码修改失败 , 请重试');location='/admin'</script>";die;
        }
    }
    /**
     * @param
     * @param 无限极分类
     */
    public function getCateInfo($data,$pid = 0)
    {
            static $info=[];
            foreach($data as $k=>$v){
                if($v->p_id==$pid){
                    $info[]=$v;
                    $this->getCateInfo($data,$v->right_id);
                }
            }
            return $info;
    }
    /**
     * 角色管理添加
     */
    public function role()
    {
        $data = DB::table('role')->get()->toArray();
//        dd($data);
        return view('admin/role',['role'=>$data]);
    }
    public function role_select()
    {
        return view('admin/role_select');
    }

    public function role_insert(Request $request)
    {
        $right_id = $request->input('right_id');
//        dd($right_id);
        $description = $request->input('description');
        $role_name = $request->input('role_name');
//        dd($role_name);
        if(empty($description) || empty($role_name)){
            return json_encode(['code'=>201,'msg'=>'内容不能为空']);
        }
        $role = DB::table('role')->insertGetId([
            'role_name'=>$role_name,
            'description'=>$description,
            'create_time'=>time()
        ]);
        if($role){
            return json_encode(['code'=>200,'msg'=>'角色创建成功 , 跳转授权','role_id'=>$role]);
        }else{
            return json_encode(['code'=>202,'msg'=>'未知错误请重试']);
        }
    }
    /**
     * 角色删除
     */
    public function role_delete(Request $request , $role_id)
    {
        $admin_role = DB::table('admin_role')->where('admin_id',$role_id)->count();
//        dd($admin_role);
        if($admin_role){
            echo "<script>alert('不可删除 , 请先移除相对的管理员 , 在进行此操作');location='/role'</script>";die;
        }else{
            $role = DB::table('role')->where('role_id',$role_id)->delete();
            if($role){
                echo "<script>alert('角色删除成功');location='/role'</script>";die;
            }else{
                echo "<script>alert('删除失败 , 请重试');location='/role'</script>";die;
            }
        }
    }
    /**
     * 角色授权
     */
    public function right(Request $request)
    {
        $role_id = $request->input('role_id');
//        dd($role_id);
//        $right = DB::table('right')->where('role_id',$role_id)->get()->toArray();
//        dd($right);
        $data = DB::table('right')->get()->toArray();
//        dd($data);
        $date = $this->getCateInfo($data);
//        dd($date);
        $data = json_decode(json_encode($data),1);
//        dd($data);
        $date = [];
        foreach($data as $k=>$v){
            if($v['p_id'] == 1){
                    $date[$k] = $v;
                    $date[$k]['name'] = [];
            }
        }
        foreach($data as $k=>$v){
            foreach($date as $ki=>$vi){
                if($vi['right_id'] == $v['p_id']){
                    $date[$ki]['name'][] = $v;
//                    dd($v);
                }
            }
        }
//        print_r($date);
        return view('admin/role_right',['role_right'=>$date,'role_id'=>$role_id]);
    }
    /**
     * 角色权限关联
     */
    public function role_right(Request $request)
    {
        $data = $request->input('role_id');
//        dd($data);
        $datas = $request->post();
        $role_id = $datas['r_id'];
        foreach($datas['r_id'] as $k=>$v){
            $date = DB::table('role_right')->insert([
                'role_id' => $data,
                'right_id' => $v
            ]);
        }
        if( $date ){
            echo "<script>alert('添加成功');location='/role'</script>";die;
        }else{
            return "<script>alert('添加失败,请重试');window.history.go(-1)</script>";die;
        }


    }
    
//     /**
//      * 讲师管理
//      */
//     /*
//    *添加讲师试图
//     * */
//     public function lecturerAdd()
//     {
//         return view('/admin/lecturerAdd');
//     }
//     /*
//      *添加讲师，个人简历，授课风格
//     * */
//     public function lecturerAddhandel(Request $request)
//     {
//         $data=$request->all();

//         $res=DB::table('lect')->insert([
//             "lect_name"=>$data['lect_name'],
//             "lect_resume"=>$data['lect_resume'],
//             "lect_style"=>$data['lect_style']
//         ]);
//         if($res){
//             echo "<script>alert('添加成功');location='/lecturerIndex'</script>";die;
//         }else{
//             echo "<script>alert('添加失败');location='/lecturerIndex'</script>";die;
//         }
//     }
//     /*
//    *展示讲师，个人简历，授课风格
//    * */
//     public function lecturerIndex(Request $request)
//     {
//         $req=$request->input('lect_name')??'';

//         $data=DB::table('lect')->where(['is_del'=>1])->where('lect_name','like','%'.$req.'%')->paginate(2);

//         return view('admin/lecturerIndex',['data'=>$data,'req'=>$req]);
//     }
//     /*
//     *讲师软删除
//     * */
//     public function del(Request $request , $lect_id)
//     {
// //        $lect_id = $request->input('lect_id');
//         $data=DB::table('lect')->where(['lect_id'=>$lect_id])->update([
//             "is_del"=>0
//         ]);
//         if($data){
//             echo "<script>alert('删除成功');location='/lecturerIndex'</script>";die;
//         }else{
//             echo "<script>alert('删除失败');location='/lecturerIndex'</script>";die;
//         }
//     }

    public function userlect()
    {
        $data=Users::join('user_info','user.u_id','=','user_info.u_id')->where('user_info.user_lect',2)->get();
    //        dd($data);
        return view('admin.userlect',['data'=>$data]);
    }

    //退出
    public function quit(){
        request()->session()->forget('admin');
        //dd(session()->all());
        echo "<script>alert('退出成功，请您登录');location='/login'</script>";die;
        //return json_encode(['code'=>1]);
    }
}
