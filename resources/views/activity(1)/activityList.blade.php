@extends('admin/layouts/main')

@section('title', '管理员')


@section('content')
    <h3 align="center">活动模块</h3>
    <div class="layui-form">
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>活动标题</th>
                <th>课程名称</th>
                <th>活动内容</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="list">
            @foreach($data as $k=>$v)
                <tr>
                    <td>{{ $v->ag_title }}</td>
                    <td>{{ $v->course_name }}</td>
                    <td>{{ $v->ag_content }}</td>
                    <td>
                        <div class="layui-btn-group">
                            <a type="button" class="layui-btn" href="activityAdd">增加</a>
                            <a type="button" class="layui-btn" ag_id="{{ $v->ag_id }}" href="activityUpd?ag_id={{ $v->ag_id }}">编辑</a>
                            <a type="button" class="layui-btn" ag_id="{{ $v->ag_id }}" href="activityDel?ag_id={{ $v->ag_id }}">删除</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
