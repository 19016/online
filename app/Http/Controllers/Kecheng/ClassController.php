<?php

namespace App\Http\Controllers\Kecheng;

use App\model\Catalog;
use App\Model\Category;
use App\Model\Course;
use App\Model\Comment;
use App\model\Job;
use App\Model\Lect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ClassController extends Controller
{
    /** 课程添加页面 */
    public function classAdd(){
        //查询讲师
        $teacher_select = Lect::all();

        //查询分类
        $category_select = Category::all();

        return view('class.classAdd',['teacher'=>$teacher_select,'category'=>$category_select]);
    }


    /** 上传视频 */
    public function upload_file($course_page, $path = "./upload",$imagesExt=['jpg','png','jpeg','gif','mp4','tmp'])
    {

        // 判断错误号



            // 判断文件类型

            $ext = strtolower(pathinfo(@$course_page['name'],PATHINFO_EXTENSION));

            if (!in_array($ext,$imagesExt)){

                return "非法文件类型";

            }

            // 判断是否存在上传到的目录

            if (!is_dir($path)){

                mkdir($path,0777,true);

            }

            // 生成唯一的文件名

            $fileName = md5(uniqid(microtime(true),true)).'.'.$ext;

            // 将文件名拼接到指定的目录下

            $destName = $path."/".$fileName;

            // 进行文件移动

            if (!move_uploaded_file($course_page['tmp_name'],$destName)){

                return "文件上传失败！";

            }
            return $destName;

    }

    /** 课程添加 */
    public function classAdddo(Request $request){
        $lect_id = $request->input('lect_id');
        $cate_id = $request->input('cate_id');
        $course_name = $request->input('course_name');
        $price = $request->input('price');
        $hour = $request->input('hour');
        $status = $request->input('status');
        $is_free = $request->input('is_free');
        $introduce = $request->input('introduce');
        $course_pag = $_FILES['course_page'];
        $course_page = $this->upload_file($course_pag);
        $course_page = ltrim($course_page,".");
        $data = [
                'lect_id'=>$lect_id,
                'cate_id'=>$cate_id,
                'course_name'=>$course_name,
                'price'=>$price,
                'course_hour'=>$hour,
                'create_time'=>time(),
                'status'=>$status,
                'is_free'=>$is_free,
                'course_page'=>$course_page,
                'jieshao'=>$introduce,
        ];
        $class_add = Course::insert($data);
        if($class_add){
            echo '添加成功';
            return redirect('/classList');
        }else{
            echo '添加失败';
            return redirect('/classAdd');
        }
    }

    /** 课程展示 */
    public function classList(){
        $where=[
            'course.is_del'=>0
        ];
        $class_select = Course::join('lect','course.lect_id','=','lect.lect_id')
            ->join('category','course.cate_id','=','category.cate_id')
            ->where($where)
            ->get()
            ->toArray();

        return view('class.classList',['class_select'=>$class_select]);
    }

    /** 课程删除 */
    public function classDel(){
        $course_id = $_GET['id'];

        //根据id进行软删除
        $where = [
            'course_id'=>$course_id
        ];
        $data = [
            'is_del'=>1
        ];
        $course_del_sql =  Course::where($where)->update($data);
        if($course_del_sql){
            echo "<script>alert('删除成功');location.href='/classList'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='/classList'</script>";
        }

    }

    /** 课程修改 页面*/
    public function classUpd(){
        $course_id = $_GET['id'];
        //查询讲师
        $teacher_select = Lect::all();


        //查询分类
        $category_select = Category::all();
        $where = [
            'course_id'=>$course_id
        ];


        //根据course_id获取数据
        $course_id_sql = Course::where($where)->get();
        return view('class.class_update',['data'=>$course_id_sql,'teacher'=>$teacher_select,'category'=>$category_select]);


    }
    /** 课程修改 */
    public function classUpddo(Request $request){
        $lect_id = $request->input('lect_id');
        $cate_id = $request->input('cate_id');
        $course_id = $request->input('course_id');
        $course_name = $request->input('course_name');
        $price = $request->input('price');
        $hour = $request->input('hour');
        $status = $request->input('status');
        $is_free = $request->input('is_free');
        $introduce = $request->input('introduce');

        /** 根据ip进行修改 */
        $where = [
            'course_id'=>$course_id
        ];
        $data = [
            'lect_id'=>$lect_id,
            'cate_id'=>$cate_id,
            'course_name'=>$course_name,
            'price'=>$price,
            'course_hour'=>$hour,
            'create_time'=>time(),
            'status'=>$status,
            'is_free'=>$is_free,
            'jieshao'=>$introduce,
            'is_del'=>0
        ];
        $class_update_sql = Course::where($where)->update($data);
        if($class_update_sql){
            echo '修改成功';
            return redirect('/classList');
        }else{
            echo '修改失败';
            return redirect("/classUpd?id=$course_id");
        }


    }

    /** 课程评论跳转 */
    public function class_comment(){
        $course_id=$_GET['id'];
        //根据课程id查询pinglun
        $where = [
            'course_id'=>$course_id
        ];
        $comment = Comment::where($where)->join('user','comment.user_id','=','user.u_id')
            ->get()
            ->toArray();
        return view('class.class_comment',['comment'=>$comment]);
    }

    /** 课程章节跳转 */
    public function class_catelog(){
        $course_id=$_GET['id'];
        //根据课程id查询pinglun
        $where = [
            'course_id'=>$course_id
        ];
        $catalog =Catalog::where($where)
            ->get()
            ->toArray();
        return view('class.class_catelog',['catalog'=>$catalog]);
    }

    /** 课程作业 */
    public function class_job(){
        $course_id=$_GET['id'];
        //根据课程id查询pinglun
        $where = [
            'course_id'=>$course_id
        ];
        $job =Job::where($where)
            ->get()
            ->toArray();
        return view('class.class_job',['job'=>$job]);
    }


}


