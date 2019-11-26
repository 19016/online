@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')



    <h2>课程列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>课程id</td>
            <td>课程名称</td>
            <td>讲师名称</td>
            <td>分类名称</td>
            <td>课程状态</td>
            <td>价钱（是否免费）</td>
            <td>课程时长</td>
            <td>课程介绍</td>
            <td>课程图片</td>
            <td>操作</td>
        </tr>
        @foreach($class_select as$k => $v)
            <tr align="center">
                <td>
                    {{$v['course_id']}}
                </td>
                <td>
                    {{$v['course_name']}}
                </td>
                <td>
                    {{$v['lect_name']}}
                </td>
                <td>
                    {{$v['cate_name']}}
                </td>
                <td>
                    @if($v['status']==1)
                        未开始
                    @elseif($v['status']==2)
                        连载中
                    @elseif($v['status']==3)
                        已完结
                    @endif
                </td>
                <td>
                    @if($v['is_free']==1)
                        免费
                    @elseif($v['is_free']==2)
                        ￥{{$v['price']}}
                    @endif
                </td>
                <td>
                    {{$v['course_hour']}}
                </td>
                <td>
                    {{$v['jieshao']}}
                </td>
                <td>
                    <img src="{{$v['course_page']}}" alt="">
                </td>

                <td>
                    @if($v['is_del']==1)
                        已经删除
                    @elseif($v['is_del']==0)
                        <a href="/classDel?id={{$v['course_id']}}">删除</a>
                    @endif
                    <a href="/classUpd?id={{$v['course_id']}}">修改</a>
                    <a href="/class_comment?id={{$v['course_id']}}">评论</a>
                    <a href="/class_catelog?id={{$v['course_id']}}">章节</a>
                    <a href="/class_job?id={{$v['course_id']}}">作业</a>
                </td>

            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="3"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>

    <a href="{{url('categoryAdd')}}" class="btn btn-primary">添加分类</a>
@endsection