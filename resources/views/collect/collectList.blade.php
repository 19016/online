@extends('admin/layouts/main')


@section('title', '收藏列表')


@section('content')

    <h2>收藏列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>用户名称：</td>
            <td>课程名称：</td>
            <td>收藏夹名称：</td>
        </tr>
        @foreach($collect as $v)
            <tr align="center">
                <td>{{$v['u_email']}}</td>
                <td>{{$v['course_name']}}</td>
                <td>{{$v['f_name']}}</td>
            </tr>
        @endforeach
    </table>
@endsection