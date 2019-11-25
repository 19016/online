@extends('admin/layouts/main')

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
                            课程id
                        </th>
                        <th>
                            课程名称
                        </th>
                        <th>
                            讲师名称
                        </th>
                        <th>
                            分类名称
                        </th>
                        <th>
                            课程状态
                        </th>
                        <th>
                            价钱(是否免费)
                        </th>
                        <th>
                            课程时长
                        </th>
                        <th>
                            课程介绍
                        </th>
                        <th>
                            课程视频或课程图片
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($class_select as $k=>$v)
                        <tr class="table-info">
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
                                {{$v['status']}}
                            </td>
                            <td>
                                @if($v['is_free']==1)
                                       免费
                                    @elseif($v['is_free']==2)
                                        {{$v['price']}}
                                @endif
                            </td>
                            <td>
                                {{$v['jieshao']}}
                            </td>
                            <td>
                                {{$v['course_hour']}}
                            </td>
                            <td>
                                <video src="{{$v['course_page']}}" style="width: 50px;height: 50px;"></video>
                            </td>

                            <td>
                                <a href="/classDel?id={{$v['course_id']}}">删除</a>
                                <a href="/classUpd?id={{$v['course_id']}}">修改</a>
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