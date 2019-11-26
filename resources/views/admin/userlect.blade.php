@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>用户审核讲师列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>用户名称</td>
            <td>用户头像</td>
            <td>用户年龄</td>
            <td>用户性别</td>
            <td>是否通过</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['u_name']}}</td>
                <td><img src="/{{$v->user_head}}" width="50" alt=""></td>
                <td>{{$v['user_age']}}</td>
                @if($v['user_sex'] == 1)
                    <td>女</td>
                @else
                    <td>男</td>
                @endif
                <td>
                    <a href="{{url('/userlects')}}?id={{$v['u_id']}}" class="btn btn-primary">是</a>
                    <a href="{{url('/userlectd')}}?id={{$v['u_id']}}" class="btn btn-primary">否</a>
                </td>

            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="6"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>
@endsection