@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h1>作业添加</h1>
    <div style="font-size: 50px; margin:0;" >
        <form action="/jobAdddo">

            <div class="form-group">
                <label>课程</label>
                <select class="form-control" name="course_id" id="kk">
                    <option value="">请选择</option>
                    @foreach($coursedata as $c)
                        <option value="{{$c['course_id']}}">{{$c['course_name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>章节</label>
                {{--<input type="type" class="form-control" name="catelog_id" >--}}
                <select name="catelog_id" id="" class="form-control cate">
                    <option value="">请选择</option>
                </select>
            </div>

            <div class="form-group">
                <label>作业名称</label>
                <input type="type" class="form-control" name="job_name">
            </div>

            <div id="attr">
                <button class="btn btn-sm btn-primary " type="submit" id="btn" ><strong>添 加</strong>
                </button>
            </div>
        </form>
    </div>
@endsection
<script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script>
    $(document).on('change','#kk',function(){
        var course_id=$(this).val();
//        alert(course_id);return;
        $('.cate').empty();
        $.ajax({
            url:"/jobchange",
            data:{course_id:course_id},
            type:"post",
            dataType:"json",
            success:function(res){
                if(res.code=200){
                    var data = res.data;
//                    console.log(data);
                    var q = '<option></option>'
                    for(var i in data){
//                        console.log(i);
                        q = ' <option value="'+data[i].catelog_id+'">'+data[i].catelog_name+'</option>';
//                        console.log(q);
                        $('.cate').append(q);
                    }
                }
            }
        })
    })
</script>

