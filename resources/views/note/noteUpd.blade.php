@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')


    <h2>修改笔记内容</h2>
    <form method="post" action="/noteUpddo">
        <input type="hidden" name="note_id" value="{{$find['note_id']}}">
        <textarea class="table-bordered table table-striped table-condensed" name="note_content">{{$find['note_content']}}</textarea>
        <button class="btn btn-danger">确认修改</button>
    </form>

@endsection