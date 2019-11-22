@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <form method="post" action="/ques_edit">
        <div class="form-group">
            <label>问答标题</label>
            <input type="type" class="form-control" name="title" value="{{$issue_find['title']}}">
        </div>
        <input type="hidden" name="issue_id" value="{{$issue_find['issue_id']}}">

        <div class="form-group">
            <label>问答内容</label>
            <textarea name="content" class="table-bordered table table-striped table-condensed">{{$issue_find['content']}}</textarea>
        </div>

        <button class="btn btn-danger">确认修改</button>
    </form>

@endsection