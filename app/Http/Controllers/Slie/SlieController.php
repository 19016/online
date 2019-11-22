<?php

namespace App\Http\Controllers\Slie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\model\Slie;

class SlieController extends Controller
{
    public function slideshow_tianjia(Request $request)
    {
        return view('slie/slideshow_tianjia');
    }
    public function slideshow_insert(Request $request)
    {
        $file = $request->file('file');
//        dd($file);
        $data = $request->input('name');
//        dd($data);
        if(empty($file)){
            echo "<script>alert('图片不能为空');history.go(-1)</script>";die;
        }
        $time = date('Y-n-j');
        $path = $request->file('file')->store($time);
//        dd($path);
        $slide =Slie::insert([
            'slide_url' => 'tupian'.'/'.$path,
            'slide_weight' =>$data,
            'time_add' => time()
        ]);
//        dd($slide);
        if($slide){
            echo "<script>alert('图片上传成功');location='/slideshow';</script>";die;
        }else{
            echo "<script>alert('图片上传失败 , 请重新上传');location='/slideshow_tianjia';</script>";die;
        }
    }

    //展示
    public function slideshow()
    {
        $slideshow = DB::table('slide')->get()->toArray();
//        dd($slideshow);
        return view('slie/slideshow',['data'=>$slideshow]);

    }

    //轮播图权重修改
    public function slide_weight(Request $request , $slide_id)
    {
//        dd($slide_id);
        $slide = DB::table('slide')->where('slide_id',$slide_id)->first();
//        dd($slide);
        return view('slie/slide_weight',['slide'=>$slide]);
    }

    public function slide_update(Request $request)
    {
        $data = $request->input();
        $slide = DB::table('slide')->where('slide_id',$data['slide_id'])->update(['slide_weight'=>$data['name']]);
        if($slide){
            echo "<script>alert('权重修改成功');location='/slideshow';</script>";die;
        }else{
            echo "<script>alert('权重修改成功');history.go(-1);</script>";die;
        }
    }
}
