@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h1>分类添加</h1>
    <div style="font-size: 50px; margin:0;" >
        <form action="/categoryAdddo">
            <div class="form-group">
                <label>分类名称</label>
                <input type="type" class="form-control" name="cate_name" id="cate_name">
            </div>
            <div class="form-group">
                <label>上级分类</label>
                <select class="form-control"  name="pid" id="">
                    <option value="0">顶级分类</option>
                    @foreach($cate as $v)
                        <option value="{{$v['cate_id']}}">@php echo str_repeat("--------",$v['level'])@endphp {{$v['cate_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div id="attr">
                <button class="btn btn-sm btn-primary " type="submit" id="btn" ><strong>添 加</strong>
                </button>
            </div>
        </form>
    </div>
@endsection

{{--<script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>--}}
<script>
    $('#cate_name').blur(function() {
        // alert(111);
        var cate_name = $('#cate_name').val();
        // console.log(cate_name);
        var _this = $(this);
        $.ajax({
            url:"/categoryAdddo",
            data:{cate_name:cate_name},
            type:'get',
            dataType:'json',
            success:function(res){
                // console.log(res);
                if (res.code==10011){
                    alert(res.msg);
                    $("#btn").prop('disabled',true);
                }else{
                    $("#btn").prop('disabled',false);
                }
            }
        })
    })
</script>

