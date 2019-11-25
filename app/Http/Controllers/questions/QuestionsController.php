<?php

namespace App\Http\Controllers\questions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Questions;
use App\model\Response;
class QuestionsController extends Controller
{
    /**
     * 问答列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function ques_list()
    {
        $data=Questions::join('user_info','questions.u_id','=','user_info.u_id')
              ->join('course','questions.course_id','=','course.course_id')
              ->where("questions.is_del",1)
              ->where("is_auth",1)
              ->paginate(15);
//        dd($data);
        return view("questions.list",['data'=>$data]);
    }

    /**
     * 问答删除
     */
    public function ques_del()
    {
        $issue_id=\request()->issue_id;
//        dd($issue_id);
        $info=Questions::where('issue_id',$issue_id)->update(['is_del'=>0]);
    }

    /**
     * 问答授权列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function ques_auth()
    {

        $data=Questions::join('user_info','questions.u_id','=','user_info.u_id')
            ->join('course','questions.course_id','=','course.course_id')
            ->where("questions.is_del",1)
            ->paginate(15);
        return view("questions.auth",['data'=>$data]);
    }

    /**
     * 执行授权
     * @return false|mixed|string
     */
    public function authDo()
    {
        $id=\request()->id;
        $info=Questions::where('issue_id',$id)->update(['is_auth'=>1]);
        if($info){
            return json_encode(["code"=>200,'msg'=>"授权通过"]);
        }else{
            return json_encode(["code"=>201,'msg'=>"服务错误"]);
        }
    }
    public function ques_desc()
    {
        $issue_id=\request()->issue_id;
        $data=Questions::where("issue_id",$issue_id)->first();

        return view("questions.desc",['data'=>$data]);
    }
    public function ques_Dodesc(request $request)
    {
        session_start();
//        print_r($_SESSION['admin_id']);
        $desc=$request->desc;
        $issue_id=$request->issue_id;
        $course_id=$request->course_id;
        $data=[
            'u_id'=>1,
            'admin_id'=>$_SESSION['admin_id'],
            'course_id'=>$course_id,
            'issue_id'=>$issue_id,
            'content'=>$desc,
            'is_del'=>1,
            'time'=>time()
        ];
        // dd($data);
        $info=Response::insert($data);
        if($info){
            return json_encode(['code'=>200,'msg'=>'回复成功']);
        }else{
            return json_encode(['code'=>201,'msg'=>'错误']);
        }
    }

    public function ques_update()
    {
        $issue_id=\request()->issue_id;
        $issue_find=Questions::where("issue_id",$issue_id)->first();
        return view("questions.update",['issue_find'=>$issue_find]);
    }

    public function ques_edit()
    {
        $data=\request()->post();
        $info=Questions::where("issue_id",$data['issue_id'])->update(['title'=>$data['title'],'content'=>$data['content'],'time'=>time()]);
        if($info){
            return redirect("/ques_list");
        }else{
            die("错误");
        }
    }

    public function ques_desclist()
    {
        $issue_id=\request()->issue_id;
        $data=Response::where("issue_id",$issue_id)->where('is_del',1)->paginate(15);
        return view("questions.desclist",['data'=>$data]);
    }

    public function response_update()
    {
        $r_id=\request()->r_id;
        $data=Response::where("r_id",$r_id)->first();
        return view("questions.response_update",['data'=>$data]);

    }
    public function response_edit()
    {
        $data=\request()->post();
//        dd($data);
        $info=Response::where("r_id",$data['r_id'])->update(['content'=>$data['content'],'time'=>time()]);
        if($info){
            return redirect("/ques_list");
        }else{
            die("错误");
        }
    }

    public function response_del()
    {
        $r_id=\request()->r_id;
        $info=Response::where("r_id",$r_id)->update(['is_del'=>2]);
        if($info){
            return redirect("/ques_list");
        }else{
            die("错误");
        }
    }
}
