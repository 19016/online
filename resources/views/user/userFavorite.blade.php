@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>用户详情列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>课程名称</td>
            <td>收藏夹名称</td>
            <td>收藏夹数量</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['course_name']}}</td>
                <td>{{$v['f_name']}}</td>
                <td>{{$v['f_num']}}</td>
            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="6"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>
@endsection