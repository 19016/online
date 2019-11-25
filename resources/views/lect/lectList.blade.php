@extends('admin/layouts/main')


@section('title', '讲师列表')


@section('content')

    <h2>讲师列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>讲师名称：</td>
            <td>讲师个人简历：</td>
            <td>讲师授课风格：</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['lect_name']}}</td>
                <td>{{$v['lect_resume']}}</td>
                <td>{{$v['lect_style']}}</td>
                <td>
                    <!-- <a href="/lectUpd/{{$v['lect_id']}}" class="btn btn-danger">编辑</a> -->
                    <a href="/lectDel/{{$v['lect_id']}}" class="btn btn-primary">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection