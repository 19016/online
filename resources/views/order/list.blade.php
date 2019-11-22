@extends('admin/layouts/main')


@section('title', '订单列表')


@section('content')

    <h2>订单列表</h2>

    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>订单号</td>
            <td>用户名</td>
            <td>课程名称</td>
            <td>支付方式</td>
            <td>价格</td>
            <td>支付状态</td>
            <td>下单时间</td>
            <td>支付时间</td>

        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['order_mark']}}</td>
                <td>{{$v['u_name']}}</td>
                <td>{{$v['course_name']}}</td>


                @if($v['pay_id'] == 1)
                    <td>  支付宝</td>
                @elseif($v['pay_id'] == 2)
                    <td>  微信</td>
                @elseif($v['pay_id'] == 3)
                    <td>  银行卡</td>
                @endif


                <td>  {{$v['pay_price']}}</td>
                @if($v['pay_status'] == 1){
                    <td>  已支付</td>
                @elseif($v['pay_status'] == 2)
                    <td>  已到货</td>
                @elseif($v['pay_status'] == 3)
                    <td>  待评价</td>
                @elseif($v['pay_status'] == 4)
                    <td>  终止交易</td>
                @elseif($v['pay_status'] == 5)
                    <td>  退款</td>
                @endif


                <td>  {{date("Y-m-d H:i:s",$v['order_time'])}}</td>

                @if($v['pay_status']==1)
                    <td>  {{date("Y-m-d H:i:s",$v['ass_time'])}}</td>
                @elseif($v['pay_status']==2)
                    <td>  {{date("Y-m-d H:i:s",$v['ass_time'])}}</td>
                @elseif($v['pay_status']==3)
                    <td>  {{date("Y-m-d H:i:s",$v['ass_time'])}}</td>
                @elseif($v['pay_status']==4)
                    <td> 该商品未支付</td>
                @elseif($v['pay_status']==5)
                    <td> 该商品未支付</td>
                @endif
            </tr>
        @endforeach
        <tr>
            <td colspan="8"> {{$data->links()}}</td>
        </tr>
    </table>

    <!-- <a href="{{url('/category/create')}}" class="btn btn-primary">添加菜单</a> -->
    @endsection