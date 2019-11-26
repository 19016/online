@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>用户详情列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>订单号</td>
            <td>支付价钱</td>
            <td>支付方式</td>
            <td>课程</td>
            <td>支付类型</td>
        </tr>
        @foreach($order as $v)
            <tr align="center">
                <td>{{$v['order_mark']}}</td>
                <td>{{$v['pay_price']}}</td>
                    @if($v['pay_type'] == 1)
                        <td>支付宝</td>
                    @elseif($v['pay_type'] == 2)
                        <td>微信</td>
                    @else
                        <td>银行卡</td>
                    @endif
                <td>{{$v['course_name']}}</td>
                    @if($v['pay_status'] == 1)
                        <td>已支付</td>
                    @elseif($v['pay_status'] == 2)
                        <td>未支付</td>
                    @else
                        <td>取消支付</td>
                    @endif
            </tr>
        @endforeach
    </table>
@endsection