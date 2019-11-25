<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Job;
use App\model\Catalog;
use App\model\Course;


class JobController extends Controller
{
    public function jobAdd()
    {
        $coursedata = Course::get()->toArray();
        $data=Catalog::get();
//        dd($data);
        return view('job.jobAdd',['data'=>$data,'coursedata'=>$coursedata]);
    }

    public function jobAdddo(Request $request)
    {
        //       echo  111;exit;
        $data = $request->all();
        $arr=[
            'course_id'=>$data['course_id'],
            'catelog_id'=>$data['catelog_id'],
            'job_name'=>$data['job_name'],
            'job_time'=>time(),
            'is_del'=>0,
        ];
        $res = Job::insert($arr);

//        dd($res);
        if ($res){
            echo "<script>alert('添加成功');location.href='/jobList';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/jobList';</script>";

        }
    }

    public function jobList()
    {
        $where=[
            'job.is_del'=>0
        ];
        $data=Job::
        join('course','job.course_id','=','course.course_id')
        ->join('catalog','job.catelog_id','=','catalog.catelog_id')
        ->where($where)
        ->paginate(4);
//        dd($data);
        return view('job.jobList',['data'=>$data]);
    }

    public function jobchange(Request $request)
    {
        $course_id=$request->course_id;
        $Catalog_data=Catalog::where("course_id",$course_id)->get();
        if($Catalog_data){
            return json_encode(['code'=>200,'data'=>$Catalog_data]);
        }else{
            return json_encode(['code'=>201,'data'=>'']);
        }
    }

    public function jobDel(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
        $res=Job::where(['job_id'=>$id])->update(['is_del'=>1]);
//        dd($res);
        //判断
        if ($res){
            echo "<script>alert('删除成功');location.href='/jobList';</script>";
        }else{
            echo "<script>alert('删除失败');location.href='/jobList'</script>";
        }
    }

    //修改
    public function jobUpd(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
        $data=Job::join('course','job.course_id','=','course.course_id')->where(['job_id'=>$id])->first()->toArray();
//        dd($data);
        $coursedata = Course::get()->toArray();
        $catelog = Catalog::get()->toArray();
//        dd($coursedata);
        return view('job.jobUpd',['data'=>$data,'course'=>$coursedata,'catalog'=>$catelog]);
    }

    public function jobUpddo(Request $request)
    {
        //接id
        $data=$request->all();
//        dd($data);
        $res=Job::where('job_id',$data['job_id'])->update($data);
//        dd($res);
        //判断
        if($res){
            echo "<script>alert('修改成功');location.href='/jobList';</script>";
        }else{
            echo "<script>alert('修改失败');location.href='/jobUpd';</script>";
        }
    }
}
