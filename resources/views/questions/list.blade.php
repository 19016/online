@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

<?php
    session_start();
    $_SESSION['admin_id']=(1);
//    echo $_SESSION['uid'];
?>
    <h2>问答列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>用户名</td>
            <td>课程名称</td>
            <td>标题</td>
            <td>正文</td>
            <td>浏览量</td>
            <td>发布时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['u_name']}}</td>
                <td>  {{$v['course_name']}}</td>
                <td>  {{$v['title']}}</td>
                <td>  {{$v['content']}}</td>
                <td>  {{$v['browse']}}</td>
                <td>  {{date("Y-m-d H:i:s",$v['time'])}}</td>
{{--                <td>  {{$v['browse']}}</td>--}}
                <td><a href="{{url('/ques_desc?issue_id=')}}{{$v['issue_id']}}" class="btn btn-primary">回复</a>
                    <a href="{{url('/ques_desclist?issue_id=')}}{{$v['issue_id']}}" class="btn btn-primary">查看所有回答</a>
                    <a href="{{url('/ques_update?issue_id=')}}{{$v['issue_id']}}" class="btn btn-primary">修改</a>
                 <a href="{{url('/ques_del?issue_id=')}}{{$v['issue_id']}}"  class="btn btn-danger">删除</a></td>

            </tr>
        @endforeach
        <tr>
            <td colspan="7"> {{$data->links()}}</td>
        </tr>
    </table>

{{--    <a href="{{url('/category/create')}}" class="btn btn-primary">添加菜单</a>--}}
@endsection