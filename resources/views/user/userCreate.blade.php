@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h1>详情添加</h1>
    <div style="font-size: 50px; margin:0;" >
        <form action="/userSave" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>上传头像</label>
                <input type="file" class="form-control" name="file">
            </div>

            <div class="form-group">
                <label>年龄</label>
                <input type="type" class="form-control" name="user_age">
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="user_sex" id="optionsRadios1" value="1">
                            女
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="user_sex" id="optionsRadios2" value="2" >
                            男
                        </label>
                    </div>
                </div>
            </div>

            <div id="attr">
                <button class="btn btn-sm btn-primary " type="submit" id="btn" ><strong>添 加</strong></button>
            </div>
        </form>
    </div>
@endsection
<script src="/js/jquery.min.js"></script>
<script>
    var url=location.search;
    var id=url.substr(4);

</script>

{{--//formdata 方式上传文件--}}
{{--$(document).on("click","#btn",function(){--}}
{{--var user_age=$("#age").val();--}}
{{--var user_sex=$(".asd").val();--}}
{{--alert(user_sex);retuzrn;--}}
{{--//        alert(111);/**/--}}
{{--//模拟表单对象  FormData--}}
{{--var fd = new FormData();--}}
{{--//        console.log(fd);return;--}}
{{--var file = $('[name="file"]')[0].files[0]; //获取到文件--}}
{{--fd.append('file',file); //在form表单里添加字段--}}
{{--$.ajax({--}}
{{--//url:"demo1.php",--}}
{{--url:"/user/userSave",--}}
{{--type:"POST",--}}
{{--data:{fd:fd,id:id},--}}
{{--contentType:false,--}}
{{--processData:false,--}}
{{--dataType:"json",--}}
{{--success:function(res){--}}

{{--}--}}
{{--})--}}
{{--})--}}


