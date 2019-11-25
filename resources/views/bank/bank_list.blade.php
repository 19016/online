@extends('admin.layouts.main')

@section('title', '后台首页')


@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">收藏夹</h4>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            题目
                        </th>
                        <th>
                            类型
                        </th>
                        <th>
                            课程
                        </th>
                        <th>
                            讲师
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bank_list as $k=>$v)
                        <tr class="table-danger">
                            <td>
                                {{$v['bank_name']}}
                            </td>
                            <td>
                                @if($v['bank_type']==1)
                                    单选
                                    @elseif($v['bank_type']==2)
                                    多选
                                    @elseif($v['bank_type']==3)
                                    填空
                                    @elseif($v['bank_type']==4)
                                    判断
                                @endif
                            </td>
                            <td>
                                {{$v['course_name']}}
                            </td>
                            <td>
                                {{$v['lect_name']}}
                            </td>
                            <td>
                                @if($v['bank_del']==0)
                                    <a href="/bank_del?id={{$v['bank_id']}}">删除</a>
                                    @elseif($v['bank_del']==1)
                                    已删除
                                @endif
                                <a href="/bank_update?id={{$v['bank_id']}}">修改</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection