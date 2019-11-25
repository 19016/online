@extends('admin/layouts/main')


@section('title', '支付方式列表')


@section('content')

    <h2>支付方式列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>支付方式名称：</td>
            <td>操作：</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['pay_name']}}</td>
                <td>
                    <!-- <a href="/lectUpd/{{$v['pay_id']}}" class="btn btn-danger">编辑</a> -->
                    <a href="/lectDel/{{$v['pay_id']}}" class="btn btn-primary">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection