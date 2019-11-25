@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>章节展示</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>章节id</td>
            <td>章节序号</td>
            <td>章节名字</td>
            <td>章节简介</td>
        </tr>
        @foreach($catalog as $k=>$v)
            <tr align="center">
                <td>{{$v['catelog_id']}}</td>
                <td>{{$v['catelog_name']}}</td>
                <td>{{$v['catalog_head']}}</td>
                <td>{{$v['catelog_describe']}}</td>
            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="3"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>

@endsection