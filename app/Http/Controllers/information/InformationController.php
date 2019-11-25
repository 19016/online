<?php

namespace App\Http\Controllers\information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Information;
class InformationController extends Controller
{
    public function information_list()
    {
        $data=Information::where("is_del",1)->paginate(15);

        return view("information.list",['data'=>$data]);
    }
    public function information_add()
    {
        return view("information.add");
    }
    public function information_Doadd()
    {
        $data=\request()->input();

        $infor_content = str_replace(array("<p>","","</p>","<br/>"),"",$data['infor_content']);
//        dd($infor_content);

         $infor_content = htmlentities($infor_content,ENT_QUOTES);
//         dd($infor_content);
        $data=[
            'infor_title'=>$data['infor_title'],
            'infor_content'=>$infor_content,
            'infor_time'=>time(),
            'infor_hot'=>0,
        ];
        $info=Information::insert($data);
        if($info){
            return redirect("/information_list");
        }else{
            die("未知错误");
        }
    }
    public function information_update()
    {
        $infor_id=\request()->infor_id;
        $data=Information::where("infor_id",$infor_id)->first();
        return view("information.update",['data'=>$data]);
    }
    public function information_edit()
    {
        $data=\request()->input();
        $infor_content = str_replace(array("<p>","","</p>","<br/>"),"",$data['infor_content']);
        $info=Information::where("infor_id",$data['infor_id'])->update(['infor_title'=>$data['infor_title'],'infor_content'=>$infor_content,'infor_time'=>time()]);
        if($info){
            return redirect("/information_list");
        }else{
            die("未知错误");
        }
    }
    public function information_del()
    {
        $infor_id=\request()->infor_id;
        $info=Information::where("infor_id",$infor_id)->update(['is_del'=>2]);
        if($info){
            return redirect("/information_list");
        }else{
            die("未知错误");
        }
    }
}
