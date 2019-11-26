<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\Users;
use App\Model\Activity;
use App\Library\Response;
use App\Validate\ModifyPwdValidate;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ActivityController extends Controller
{
    //精彩活动添加
    public function activityAdd(Request $request){
        $data = Course::where(['is_del'=>0])->get();
        return view('activity(1).activityAdd',compact(['data']));
    }

    //精彩活动执行添加
    public function activityAdddo(Request $request){
        $data = $request->input();
        $activityinfo=Activity::where(['ag_title'=>$data['ag_title']])->first();
        if($data['ag_title']==$activityinfo['ag_title']){
            echo "<script>alert('活动已存在，请勿重新添加');location='/activityList'</script>";die;
        }else{
            $res =Activity::insert($data);
            echo "<script>alert('活动添加成功');location='/activityList'</script>";die;
        }

    }

    //精彩活动执行列表
    public function activityList(Request $request){
        $data =Activity::join('Course','activity.course_id','=','Course.course_id')->where(['activity.is_del'=>0])->get();
        return view('activity(1).activityList',['data'=>$data]);
    }

    //精彩活动删除
    public function activityDel(Request $request){
        $ag_id = request()->ag_id;
        //修改状态
        $res =Activity::where(['ag_id'=>$ag_id])->update(['is_del'=>1]);
        if($res){
            echo "<script>alert('删除成功');location='/activityList'</script>";die;
        }else{
            echo "<script>alert('删除失败');location='/activityList'</script>";die;
        }
    }

    public function activityUpd(Request $request){
        $data1 = Course::where(['is_del'=>0])->get();
        $data = $request->all();
        $res = Activity::where(['ag_id'=>$data['ag_id']])->get()->toArray();
        //  dd($res);
        return view('activity(1).activityUpd',['res'=>$res,'data1'=>$data1]);
    }

    public function activityUpddo(Request $request){
        $data = $request->all();
        $res = Activity::where(['ag_id'=>$data['ag_id']])->update
        (['ag_title'=>$data['ag_title'],'ag_content'=>$data['ag_content']]);
        if($res){
            echo "<script>alert('修改成功');location='/activityList'</script>";die;
        }else{
            echo "<script>alert('修改失败');location='/activityList'</script>";die;
        }
    }


}