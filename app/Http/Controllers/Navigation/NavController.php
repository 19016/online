<?php

namespace App\Http\Controllers\Navigation;

use App\Model\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavController extends Controller
{
    public function Nav_add(){
        return view('nav.nav_add');
    }

    public function Nav_add_do(Request $request){
        $all = $request->input();

        $data = [
            'nav_name'=>$all['nav_name'],
            'nav_url'=>$all['nav_url']
        ];

        $nav_add_sql = Nav::insert($data);
        if($nav_add_sql){
            echo '添加成功';
            return redirect('/nav_list');
        }else{
            echo '添加失败';
            return redirect('/nav_add');
        }
    }

    public function Nav_List(){
        $nav_list = Nav::all();
        return view('nav.nav_list',['nav_list'=>$nav_list]);
    }

    public function Nav_Del(){
        $nav_id = $_GET['id'];

        //根据id进行软删除
        $where = [
            'nav_id'=>$nav_id
        ];
        $data = [
            'nav_del'=>1
        ];
        $course_del_sql =  Nav::where($where)->update($data);
        if($course_del_sql){
            echo '删除成功';
            return redirect('/nav_list');
        }else{
            echo '删除失败';
        }
    }

    public function Nav_Update(){
        $nav_id = $_GET['id'];

        $where = [
            'nav_id'=>$nav_id
        ];

        //根据course_id获取数据
        $nav_update_del = Nav::where($where)->get()->toArray();
        return view('nav.nav_update',['data'=>$nav_update_del]);
    }

    public function Nav_Update_Do(Request $request){
        $all = $request->input();

        $data = [
            'nav_name'=>$all['nav_name'],
            'nav_url'=>$all['nav_url']
        ];
        $where = [
            'nav_id'=>$all['nav_id']
        ];

        $nav_update_sql = Nav::where($where)->update($data);
        if($nav_update_sql){
            echo '修改成功';
            return redirect('/nav_list');
        }else{
            echo '修改失败';
            $nav_id = $all['nav_id'];
            return redirect("/nav_update?id=$nav_id");
        }
    }
}
