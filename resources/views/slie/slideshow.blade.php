@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <a href="{{url('/slideshow_tianjia')}}">添加</a>
        <table class="table">
            <tr>
                <td>ID</td>
                <td>图片</td>
                <td>权重</td>
                <td>是否展示</td>
                <td>上传时间</td>
                <td>操作</td>
            </tr>
            @foreach($data as $v)
            <tr>
                <td>{{$v->slide_id}}</td>
                <td><img src="/{{$v->slide_url}}" width="50" alt=""></td>
                <td>{{$v->slide_weight}}</td>
                <td>
                    @if( ($v->status) == 0)
                        <a href="">使用</a>
                    @else
                        <a href="">禁用</a>
                    @endif
                </td>
                <td>{{date('Y-m-d H:i:s',$v->time_add)}}</td>
                <td>
                    <a href="{{url('/slie/slide_weight',['slide_id'=>$v->slide_id])}}">权重修改</a>
                </td>
            </tr>
            @endforeach
        </table>

@endsection