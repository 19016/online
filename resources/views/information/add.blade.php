@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')

    <script type="text/javascript" src="{{asset('/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" src="{{asset('/ueditor/ueditor.all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/ueditor/lang/zh-cn/zh-cn.js')}}"></script>


    <h2>添加咨询内容</h2>
    <form method="post" action="/information_Doadd">
        <div class="form-group">
            <label>咨询标题</label>
            <input type="type" class="form-control" name="infor_title">
        </div>
        <div class="form-group">
            <label>咨询内容</label>
            <textarea  name="infor_content" id="goods_intro" style="width: 600px;height: 250"></textarea>
        </div>
        <button class="btn btn-danger">添加</button>
    </form>
    <script src="/js/jquery.min.js"></script>
    <script>

            var ue = UE.getEditor('goods_intro');
            // var title = $().html('title');
            // alert(title);

</script>
@endsection