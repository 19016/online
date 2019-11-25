@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h1>用户添加</h1>
    <div style="font-size: 50px; margin:0;" >
        <form action="/userAddo" method="post">

            <div class="form-group">
                <label>用户名称</label>
                <input type="type" class="form-control" name="u_name">
            </div>

            <div class="form-group">
                <label>用户密码</label>
                <input type="password" class="form-control" name="u_pwd">
            </div>

            <div class="form-group">
                <label>用户邮箱</label>
                <input type="email" class="form-control" name="u_email">
            </div>

            <div id="attr">
                <button class="btn btn-sm btn-primary " type="submit" id="btn" ><strong>添 加</strong>
                </button>
            </div>
        </form>
    </div>
@endsection


