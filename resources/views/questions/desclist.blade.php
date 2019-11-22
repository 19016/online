@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h2>回答列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>正文</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['content']}}</td>
                {{--                <td>  {{$v['browse']}}</td>--}}
                <td>
                    <a href="{{url('/response_update?r_id=')}}{{$v['r_id']}}" class="btn btn-primary">修改</a>
                    <a href="{{url('/response_del?r_id=')}}{{$v['r_id']}}"  class="btn btn-danger">删除</a>
                </td>

            </tr>
        @endforeach
        <tr>
            <td colspan="2"> {{$data->links()}}</td>
        </tr>
    </table>

@endsection