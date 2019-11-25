@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h2>问答列表</h2>
    <table class="table-bordered table table-striped table-condensed">
        <tr align="center">
            <td>用户名</td>
            <td>课程名称</td>
            <td>标题</td>
            <td>正文</td>
            <td>浏览量</td>
            <td>发布时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr align="center">
                <td>{{$v['u_name']}}</td>
                <td>  {{$v['course_name']}}</td>
                <td>  {{$v['title']}}</td>
                <td>  {{$v['content']}}</td>
                <td>  {{$v['browse']}}</td>
                <td>  {{date("Y-m-d H:i:s",$v['time'])}}</td>
                {{--                <td>  {{$v['browse']}}</td>--}}
                @if($v['is_auth'] == 0)
                    <td is="{{$v['issue_id']}}" class="btn btn-primary auth" >通过 </td>
                @else
                    <td class="btn btn-primary"> 已通过 </td>
                @endif
            </tr>
        @endforeach
        <tr>
                    <td colspan="7"> {{$data->links()}}</td>
        </tr>
    </table>



@endsection
<script src="/js/jquery.min.js"></script>
<script>
    $(document).on("click",".auth",function(){
        var win=window.confirm("是否授权");
        if(win){
            var id=$(this).attr("is");
            $.ajax({
                url:"/authDo",
                data:{id:id},
                type:"get",
                dataType:"json",
                success:function(res){
                    if(res.code==200){
                        alert(res.msg);
                        history.go(0)
                    }else{
                        alert(res.msg);
                    }
                }
            })

        }

    })
</script>