@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h1>用户详情页</h1>
    <div style="font-size: 50px; margin:0;" >

            {{--<div class="form-group">--}}
                {{--<label>用户名称</label>--}}
                {{--<input type="type" class="form-control"  name="u_name">--}}
            {{--</div>--}}

            <div class="form-group">
                <label>上传头像</label>
                <input type="file" class="form-control" name="user_head">
            </div>

            <div class="form-group">
                <label>年龄</label>
                <input type="type" class="form-control" name="user_age" id="age">
            </div>

            <div class="form-group">
                <label>性别</label>
                男：<input type="radio" class="asd form-control" name="user_sex" value="1" >
                女：<input type="radio" class="asd form-control" name="user_sex" value="2" >
            </div>

            <div id="attr">
                <button class="btn btn-sm btn-primary " id="btn" >添 加</button>
            </div>
    </div>
@endsection
<script src="/js/jquery.min.js"></script>
<script>
    var url=location.search;
    var id=url.substr(4);
    //formdata 方式上传文件
    $(document).on("click","#btn",function(){
        var user_age=$("#age").val();
        var user_sex=$(".asd").val();
        alert(user_sex);return;
//        alert(111);/**/
        //模拟表单对象  FormData
        var fd = new FormData();
//        console.log(fd);return;
        var file = $('[name="file"]')[0].files[0]; //获取到文件
        fd.append('file',file); //在form表单里添加字段
        $.ajax({
            //url:"demo1.php",
            url:"/userSave",
            type:"POST",
            data:{fd:fd,id:id},
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(res){

            }
        })
    })
</script>


