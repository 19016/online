<?php

namespace App\Http\Controllers\Comment;

use App\Model\Comment;
use App\Model\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /** 评论展示 */
    public function commentList(){
        // $where = [
        //     'is_del'=>0
        // ];
        $where=[
            'comment.comment_del'=>0
        ];
        //展示评论以及课程
        $comment =  Comment::join('course','comment.course_id','=','course.course_id')
            ->join('user','comment.user_id','=','user.u_id')
            ->where($where)
            ->get()
            ->toArray();

        return view('comment.commentList',['comment'=>$comment]);

    }

    /** 删除不必要的评论 */
    public function commentDel(){
        $id = $_GET['id'];

        $where = [
            'comment_id'=>$id
        ];
        $data = [
            'comment_del'=>1
        ];
        $comment_del_sql = Comment::where($where)->update($data);
        if($comment_del_sql){
            echo "<script>alert('删除成功');location.href='/commentList'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='/commentList'</script>";
        }

    }
}
