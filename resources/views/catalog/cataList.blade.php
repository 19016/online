@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>章节列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>章节编号</td>
            <td>课程</td>
            <td>章节名称</td>
            <td>章节标题</td>
            <td>视频</td>
            <td>章节描述</td>
            <td>是否免费</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['catelog_id']}}</td>
                <td>{{$v['course_name']}}</td>
                <td>{{$v['catelog_name']}}</td>
                <td>{{$v['catalog_head']}}</td>
                <td>
                    {{--<video src="{{$v['course_page']}}" width="100"></video>--}}
                    <video src="{{$v['video_url']}}" controls="controls" width="100">
                    </video>
                </td>
                <td>{{$v['catelog_describe']}}</td>

                @if($v['is_frees'] == 1)
                    <td>免费</td>
                @else
                    <td>付费</td>
                @endif
                <td><a href="{{url('cataUpd')}}?id={{$v['catelog_id']}}" class="btn btn-danger">编辑</a>
                    |
                    {{--@if($v['is_del'] == 0)--}}
                    <a href="{{url('cataDel')}}?id={{$v['catelog_id']}}" class="btn btn-primary">删除</a>
                    {{--@else--}}
                    {{--<a href="#" class="btn btn-primary">已删除</a>--}}
                    {{--@endif--}}
                </td>

            </tr>
        @endforeach
        <tr>
            <td colspan="8"> {{$data->links()}}</td>
        </tr>
    </table>

    <a href="{{url('/cataAdd')}}" class="btn btn-primary">添加菜单</a>


@endsection