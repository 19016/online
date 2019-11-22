@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>作业列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>作业ID</td>
            <td>课程ID</td>
            <td>章节ID</td>
            <td>作业名称</td>
            <td>创建时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
           <?php $time = date("Y-m-d H:i:s",$v['job_time'])?>
            <tr align="center">
                <td>{{$v['job_id']}}</td>
                <td>{{$v['course_name']}}</td>
                <td>{{$v['catelog_name']}}</td>
                <td>{{$v['job_name']}}</td>
                <td>{{$time}}</td>
                <td><a href="{{url('jobUpd')}}?id={{$v['job_id']}}" class="btn btn-danger">编辑</a>
                    |
                    <a href="{{url('jobDel')}}?id={{$v['job_id']}}" class="btn btn-primary">删除</a>
                </td>

            </tr>
        @endforeach
        <tr>
        <td colspan="6"> {{$data->links()}}</td>
        </tr>
    </table>

    <a href="{{url('/jobAdd')}}" class="btn btn-primary">添加作业</a>


@endsection