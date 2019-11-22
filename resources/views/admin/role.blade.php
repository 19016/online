@extends('admin/layouts/main')

@section('title', '管理员')


@section('content')
    <h4><a href="{{url('role_select')}}?right_id=17">添加</a></h4>
    <table class="table">
        <tr align="center">
            <td>序号</td>
            <td>名称</td>
            <td>介绍</td>
            <td>操作</td>
        </tr>
        @foreach($role as $v)
        <tr align="center">
            <td>{{$v->role_id}}</td>
            <td>{{$v->role_name}}</td>
            <td>{{$v->description}}</td>
            <td>
                <a href="{{url('role_delete',['role_id'=>$v->role_id])}}?right_id=14">删除</a>
<!-- {{--                <a href="{{url('role_delete',['role_id'=>$v->role_id])}}?right_id=15">角色修改</a>--}} -->
<!-- {{--                <a href="{{url('role_delete',['role_id'=>$v->role_id])}}?right_id=13">权限设置</a>--}} -->

            </td>
        </tr>
        @endforeach
    </table>
    @endsection
