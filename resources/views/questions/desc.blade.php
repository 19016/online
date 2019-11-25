@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

        用户发布的内容：
        <textarea name="" class="table-bordered table table-striped table-condensed">{{$data->content}}</textarea>
        <textarea name="desc" class="table-bordered table table-striped table-condensed" id="text"></textarea>
        <input type="hidden" value="{{$data['course_id']}}" id="course_id">
        <button class="btn btn-primary" id="but">确认回复</button>



@endsection

<script src="/js/jquery.min.js"></script>
<script>
    var url=location.search;
    var issue_id=url.substr(10);
    $(document).on("click","#but",function(){
        var desc=$("#text").val();
        var course_id=$("#course_id").val();

        $.ajax({
            url:"/ques_Dodesc",
            data:{issue_id:issue_id,desc:desc,course_id:course_id},
            type:"post",
            dataType:"json",
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    location.href="/ques_list";
                }else{
                    alert(res.msg);
                }
            }
        })
    })
</script>
