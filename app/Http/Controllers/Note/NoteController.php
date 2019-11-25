<?php

namespace App\Http\Controllers\Note;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Note;
class NoteController extends Controller
{
    public function noteList()
    {
//        echo 111;die;
        $data=Note::join('user_info','note.u_id','=','user_info.u_id')
            ->join('course','note.course_id','=','course.course_id')
            ->where("note.is_del",0)
            //->get()
            //->toArray();
            ->paginate(5);
    //    dd($data);
        return view("note.noteList",['data'=>$data]);
    }

    public function noteDel()
    {
        $id=\request()->note_id;
//        dd($id);
        $info=Note::where('note_id',$id)->update(['is_del'=>1]);
        echo "<script>alert('删除成功');location.href='/noteList'</script>";
    }
    public function noteUpd()
    {
        $id=\request()->note_id;
//        dd($id);
        $find=Note::where("note_id",$id)->first();
        return view("note.noteUpd",['find'=>$find]);
    }
    public function noteUpddo(request $request)
    {
        $id=$request->input("note_id");
        $note_content=$request->input("note_content");
        $info=Note::where("note_id",$id)->update(['note_content'=>$note_content]);
        if($info){
            echo "<script>alert('修改成功');location.href='/noteList'</script>";
        }else{
            die("未知错误");
        }

    }
}
