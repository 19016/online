@extends('admin/layouts/main')


@section('title', '讲师列表')


@section('content')

    <h2>讲师课程列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>讲师名称：</td>
            <td>课程名称：</td>
            <!-- <td>操作</td> -->
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['lect_name']}}</td>
                <td>{{$v['course_name']}}</td>
                <!-- <td>
                    <a href="/lectUpd/{{$v['lect_id']}}" class="btn btn-danger">编辑</a>
                    <a href="/lectprofit/{{$v['lect_id']}}" class="btn btn-primary">讲师收益</a>
                    <a href="/lectClass/{{$v['lect_id']}}" class="btn btn-primary">我的课程</a>
                    <a href="/lectDel/{{$v['lect_id']}}" class="btn btn-primary">删除</a>
                </td> -->
            </tr>
        @endforeach
    </table>
@endsection