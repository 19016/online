<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Catalog;
use App\model\Course;
use App\model\Job;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function cataAdd()
    {
        $coursedata = Course::get()->toArray();
//        dd($coursedata);
        return view('catalog.cataAdd',['coursedata'=>$coursedata]);
    }

    public function cataAdddo(Request $request)
    {
        //       echo  111;exit;
        $data = $request->all();
//        dd($data);
        $arr=[
            'course_id'=>$data['course_id'],
            'catelog_name'=>$data['catelog_name'],
            'catalog_head'=>$data['catalog_head'],
            'catelog_describe'=>$data['catelog_describe'],
            'is_del'=>0,
            'is_frees'=>$data['is_frees'],
            'video_url'=>$data['audio']
        ];

        $res = Catalog::insert($arr);
//        $ress=Catalog::
//            join('category', 'category.id', '=', 'contacts.user_id');
//        dd($res);
        if ($res){
            echo "<script>alert('添加成功');location.href='/cataList';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/cataAdd';</script>";

        }
    }

    //上传视频
    public function audio(Request $request)

    {
        //dd(0);
        if ($request->hasFile('file')) {

            $file = $request->file('file'); // 获取上传的文件

// 获取文件相关信息

            $originalName = $file->getClientOriginalName(); // 文件原名
            $extension = $file->extension();     // 例如，png
            $new_file_name = uniqid('notefeel_') . '.' . $extension;
            // dd($new_file_name);
            $realPath = $file->getRealPath(); //临时文件的绝对路径

            Storage::disk('audio')->put($new_file_name, file_get_contents($realPath)); // 文件名称 ， 内容

            return response(['message' => '上传成功','url'=> '/uploads/audio/'.$new_file_name], 201);

        } else {
            //dd(0);

            return response(['message' => '请重新上传'], 400);

        }

    }


    public function cataList()
    {
        $data=Catalog::join('course','catalog.course_id','=','course.course_id')->paginate(2);
//        dd($data);
        return view('catalog.cataList',['data'=>$data]);
    }


    public function cataDel(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
        $res=Catalog::where(['catelog_id'=>$id])->update(['is_del'=>1]);
//        dd($res);
        //判断
        if ($res){
            echo "<script>alert('删除成功');location.href='/cataList';</script>";
        }else{
            echo "<script>alert('删除失败');location.href='/cataList'</script>";
        }
    }


    //修改
    public function cataUpd(Request $request)
    {
        $id=$request->input('id');
//        dd($id);
        $data=Catalog::join('course','catalog.course_id','=','course.course_id')->where(['catelog_id'=>$id])->first()->toArray();
//        dd($data);
        $course = Course::get()->toArray();
//        dd($course);
        return view('catalog.cataUpd',['data'=>$data,'course'=>$course,]);
    }

    public function cataUpddo(Request $request)
    {
        //接id
        $data=$request->all();
//        dd($data);
        $catelog_id = $data['catelog_id'];
        if(empty($data['video_url'])){
            $arr = [
                "course_id" => $data['course_id'],
                  "catelog_name" => $data['catelog_name'],
                  "catalog_head" => $data['catalog_head'],
                  "catelog_describe" => $data['catelog_describe'],
                  "is_frees" => $data['is_frees'],
            ];
            $res=Catalog::where('catelog_id',$data['catelog_id'])->update($arr);
        }else{
            $url = Catalog::where('catelog_id',$data['catelog_id'])->first('video_url');
//            dd($url);
            Storage::delete($url->video_url);
//            dd($url);
            $arr = [
                "course_id" => $data['course_id'],
                "catelog_name" => $data['catelog_name'],
                "catalog_head" => $data['catalog_head'],
                "catelog_describe" => $data['catelog_describe'],
                'video_url'=>$data['video_url'],
                "is_frees" => $data['is_frees'],
            ];

            $res=Catalog::where('catelog_id',$data['catelog_id'])->update($arr);
        }

//        dd($res);
        //判断
        if($res){
            echo "<script>alert('修改成功');location.href='/cataList';</script>";
        }else{
            echo "<script>alert('修改失败');location.href='/cataUpd?id='+$catelog_id;</script>";
        }
    }

}
