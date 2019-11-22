@extends('admin.layouts.main')

@section('title', '后台首页')


@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">课程展示</h4>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            导航id
                        </th>
                        <th>
                            导航名
                        </th>
                        <th>
                            导航url
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nav_list as $k=>$v)
                        <tr class="table-info">
                            <td>
                                {{$v['nav_id']}}
                            </td>
                            <td>
                                {{$v['nav_name']}}
                            </td>
                            <td>
                                {{$v['nav_url']}}
                            </td>
                            <td>
                                @if($v['nav_del']==1)
                                    已经删除
                                @elseif($v['nav_del']==0)
                                    <a href="/nav_del?id={{$v['nav_id']}}">删除</a>
                                @endif
                                <a href="/nav_update?id={{$v['nav_id']}}">修改</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection