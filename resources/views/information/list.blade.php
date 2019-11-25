@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')


    <h2>咨询列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>咨询标题</td>
            <td>咨询内容</td>
            <td>发布时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['infor_title']}}</td>
                <td>
                    <?= html_entity_decode($v['infor_content'],ENT_QUOTES)?>
                </td>
                <td>  {{date("Y-m-d H:i:s",$v['infor_time'])}}</td>
                <td>
                    <a href="{{url('/information_update?infor_id=')}}{{$v['infor_id']}}"  class="btn btn-danger">修改</a>

                    <a href="{{url('/information_del?infor_id=')}}{{$v['infor_id']}}"  class="btn btn-danger">删除</a></td>

            </tr>
        @endforeach
        <tr>
            <td colspan="5"> {{$data->links()}}</td>
        </tr>
    </table>

    {{--    <a href="{{url('/category/create')}}" class="btn btn-primary">添加菜单</a>--}}
@endsection