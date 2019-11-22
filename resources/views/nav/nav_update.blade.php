@extends('admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="post" action="/nav_update_do">
                        <input type="hidden" value="{{$data[0]['nav_id']}}" name="nav_id">
                        <div class="form-group">
                            <label for="exampleInputUsername1">导航栏名称</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="nav_name" value="{{$data[0]['nav_name']}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">导航栏地址</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="url" name="nav_url" value="{{$data[0]['nav_url']}}">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">添加</button>
                    </form>
                </div>
            </div>
        </div>
@endsection