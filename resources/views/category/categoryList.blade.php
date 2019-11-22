@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')


    <h2>分类列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>分类编号</td>
            <td>分类名称</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['cate_id']}}</td>
                <td> @php echo str_repeat("——————",$v['level'])@endphp {{$v['cate_name']}}</td>
                <td><a href="{{url('categoryUpd')}}?id={{$v['cate_id']}}" class="btn btn-danger">编辑</a>
                    |
                    <a href="{{url('categoryDel')}}?id={{$v['cate_id']}}" class="btn btn-primary">删除</a>
                </td>

            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="3"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>

    <a href="{{url('categoryAdd')}}" class="btn btn-primary">添加分类</a>
@endsection
