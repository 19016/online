@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <form method="post" action="/response_edit">

        <input type="hidden" name="r_id" value="{{$data['r_id']}}">

        <div class="form-group">
            <label>问答内容</label>
            <textarea name="content" class="table-bordered table table-striped table-condensed">{{$data['content']}}</textarea>
        </div>

        <button class="btn btn-danger">确认修改</button>
    </form>

@endsection