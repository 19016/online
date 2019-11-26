@extends('admin/layouts/main')


@section('title', '订单列表')


@section('content')

    <h2>订单列表</h2>

    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>课程</td>
            <td>金额</td>
            <td>支付方式</td>
            <td>支付状态</td>
            <td>支付时间</td>
            <td>下单时间</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['course_name']}}</td>
                <td>{{$v['pay_price']}}</td>

                                @if($v['pay_id'] == 1)
                                    <td>  支付宝</td>
                                @elseif($v['pay_id'] == 2)
                                    <td>  微信</td>
                                @elseif($v['pay_id'] == 3)
                                    <td>  银行卡</td>
                                @endif
                @if($v['pay_status'] == 1)
                    <td>  已支付</td>
                @elseif($v['pay_status'] == 2)
                    <td>  未支付</td>
                @elseif($v['pay_status'] == 3)
                    <td>  取消支付</td>
                    @endif


                @if($v['pay_status'] == 1)
                    <td>  {{date("Y-m-d H:i:s",$v['pay_time'])}}</td>
                @elseif($v['pay_status'] == 2)
                    <td>  该商品未支付</td>
                @elseif($v['pay_status'] == 3)
                    <td>  该商品未支付</td>
                @endif



                    <td>  {{date("Y-m-d H:i:s",$v['order_time'])}}</td>

            </tr>
        @endforeach
        <tr>
            <td colspan="6"> {{$data->links()}}</td>
        </tr>
    </table>



@endsection
