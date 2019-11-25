@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')


    <h2>笔记列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>用户名</td>
            <td>课程名称</td>
            <td>笔记内容</td>
            <td>发布时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['u_name']}}</td>
                <td>  {{$v['course_name']}}</td>
                <td>  {{$v['note_content']}}</td>
                <td>  {{date("Y-m-d H:i:s",$v['time'])}}</td>
                <td>
                    <a href="{{url('/noteUpd?note_id=')}}{{$v['note_id']}}"  class="btn btn-danger">修改</a>

                    <a href="{{url('/noteDel?note_id=')}}{{$v['note_id']}}"  class="btn btn-danger">删除</a></td>

            </tr>
        @endforeach
        <tr>
                    <td colspan="5"> {{$data->links()}}</td>
        </tr>
    </table>

    {{--    <a href="{{url('/categoryAdd')}}" class="btn btn-primary">添加菜单</a>--}}
@endsection