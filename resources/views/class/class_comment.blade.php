@extends('admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>
                    <p class="card-description">
                        Add class <code>.table</code>
                    </p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>用户</th>
                            <th>评论内容</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comment as $k=>$v)
                            <tr>
                                <td>{{$v['u_email']}}</td>
                                <td>{{$v['comment_desc']}}</td>
                                <td>
                                    @if($v['comment_del']==1)
                                        已经删除
                                    @elseif($v['comment_del']==0)
                                        <label class="badge badge-warning">
                                            <a href="/comment_del?id={{$v['comment_id']}}">删除</a>
                                        </label>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection