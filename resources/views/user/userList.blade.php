@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>用户列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>用户ID</td>
            <td>用户名称</td>
            <td>用户密码</td>
            <td>用户邮箱</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['u_id']}}</td>
                <td>{{$v['u_name']}}</td>
                <td>{{$v['u_pwd']}}</td>
                <td>{{$v['u_email']}}</td>
                <td>
                    <a href="{{url('userIndex')}}?id={{$v['u_id']}}" class="btn btn-primary">用户详情</a>

                </td>

            </tr>
        @endforeach
        {{--<tr>--}}
            {{--<td colspan="6"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>
@endsection