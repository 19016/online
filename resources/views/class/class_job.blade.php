@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>章节展示</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>作业id</td>
            <td>作业名称</td>
        </tr>
        @foreach($job as $k=>$v)
            <tr align="center">
                <td>{{$v['job_id']}}</td>
                <td>{{$v['job_name']}}</td>
            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="3"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>

@endsection