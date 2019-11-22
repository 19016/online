@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>用户列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>用户名称</td>
            <td>用户头像</td>
            <td>用户年龄</td>
            <td>用户性别</td>
            <td>用户注册时间</td>
        </tr>
        @foreach($user as $v)
            <?php $time = date("Y-m-d H:i:s",$v['user_time'])?>
            <tr align="center">
                <td>{{$v['u_name']}}</td>
                <td>{{$v['user_head']}}</td>
                <td>{{$v['user_age']}}</td>
                @if($v['user_sex'] == 1)
                    <td>女</td>
                @else
                    <td>男</td>
                @endif
                <td>{{$time}}</td>

            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="6"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>
@endsection