@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <h2>用户详情列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>用户名称</td>
            <td>用户头像</td>
            <td>用户年龄</td>
            <td>用户性别</td>
            <td>用户状态</td>
            <td>用户注册时间</td>
            <td>操作</td>
        </tr>
        @foreach($user as $v)
            <?php $time = date("Y-m-d H:i:s",$v['user_time'])?>
            <tr align="center">
                <td>{{$v['u_name']}}</td>
                <td><img src="/{{$v->user_head}}" width="50" alt=""></td>
                <td>{{$v['user_age']}}</td>
                    @if($v['user_sex'] == 1)
                        <td>女</td>
                    @else
                        <td>男</td>
                    @endif
                <td>
                    @if($v['user_status']==1)
                        <span style="color:red;" class="frame" user_status="{{$v['user_status']}}" u_id="{{$v['u_id']}}">禁用</span>
                    @else
                        <span style="color:green;" class="frame" user_status="{{$v['user_status']}}" u_id="{{$v['u_id']}}">启用</span>
                    @endif
                </td>
                <td>{{$time}}</td>
                <td>
                    <a href="{{url('/userFavorite')}}?id={{$v['u_id']}}" class="btn btn-primary">用户收藏</a>
                        @if($v['user_lect'] == 1)
                    <a href="{{url('/userLect')}}?id={{$v['u_id']}}" class="btn btn-primary">升级讲师</a>
                        @elseif($v['user_lect'] == 2)
                        <a href="" class="btn btn-primary">待审核</a>
                            @elseif($v['user_lect'] == 3)
                        <a href="" class="btn btn-primary">待面试</a>
                    @endif
                    <a href="{{url('/userOrder')}}?id={{$v['u_id']}}" class="btn btn-primary">订单详情</a>
                </td>
            </tr>
        @endforeach
        {{--<tr>--}}
        {{--<td colspan="6"> {{$data->links()}}</td>--}}
        {{--</tr>--}}
    </table>
@endsection
<script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script>
    $(document).on('click','.frame',function(){
        // alert(111);
        var u_id = $(this).attr('u_id');
        // alert(u_id);
        var user_status = $(this).attr('user_status');
        if(user_status==2){
            user_status = 1;
        }else{
            user_status = 2;
        }
        $.ajax({
            url:"/useron",
            data:{user_status:user_status,u_id:u_id},
            type:"POST",
            dataType:"json",
            success:function(res){
                if(res.code==1){
                    alert(res.msg);
                    history.go(0)

                }else{
                    alert(res.msg);
                    history.go(0)
                }
            }
        })
    });
</script>