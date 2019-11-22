@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h1>分类修改</h1>
    <div style="font-size: 50px; margin:0;" >
            <div class="form-group">
                <label>分类名称</label>
                <input type="type" class="form-control" name="cate_name" value="{{$data['cate_name']}}" cate_id="{{$data['cate_id']}}" id="cate_name">
            </div>
            <div class="form-group">
                <label>上级分类</label>
                <select class="form-control" value="{{$data['pid']}}" name="pid" id="pid">
                    <option value="0">顶级分类</option>
                    @foreach($cateinfo as $v)
                        <option value="{{$v['cate_id']}}"  @if($v['cate_id']==$data['pid']) selected @endif>@php echo str_repeat("--------",$v['level'])@endphp {{$v['cate_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div id="attr">
                <button class="btn btn-sm btn-primary " type="submit" id="btn" >修改</button>
            </div>
    </div>
@endsection

<script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script>
    $(document).on('click','.btn',function(){
//         alert(111);return;
        var cate_name = $('#cate_name').val();
        var pid = $('#pid').val();
        var cate_id = $('#cate_name').attr('cate_id');
    //    alert(pid);return;
        $.ajax({
            url:"/categoryUpddo",
            data:{cate_name:cate_name,cate_id:cate_id,pid:pid},
            type:'get',
            dataType:'json',
            success:function(res){
                // console.log(res);
                if (res.code==1){
                    alert(res.content);
                    location.href="/categoryList";
                }else{
                    alert(res.content)
                }
            }
        })
    })
</script>

