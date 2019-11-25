@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <h1>章节修改</h1>
    <div style="font-size: 50px; margin:0;" >
        <form action="/cataUpddo" >

            <div class="form-group">
                <label>课程</label>
                <select class="form-control"  name="course_id" id="">
                    @foreach($course as $c)
                        <option value="{{$c['course_id']}}" @if($c['course_id']==$data['course_id']) selected @endif>{{$c['course_name']}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="catelog_id" value="{{$data['catelog_id']}}">
            <div class="form-group">
                <label>章节名称</label>
                <input type="type" class="form-control" value="{{$data['catelog_name']}}" name="catelog_name">
            </div>

            <div class="form-group">
                <label>章节标题</label>
                <input type="type" class="form-control" value="{{$data['catalog_head']}}" name="catalog_head">
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">章节描述</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="exampleTextarea1"  name="catelog_describe" rows="4" id="introduce">{{$data['catelog_describe']}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-upload">

                <button type="button" class="btn btn-sm btn-primary" id="test2">上传视频</button>

                <input type="hidden" id="myAudioo" name="video_url" value="">
                <video src="{{$data['video_url']}}" controls="controls" width="100">

            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"  @if($data['is_frees']==1) checked @endif name="is_frees" id="optionsRadios1" value="1">
                            免费
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" @if($data['is_frees']==2) checked @endif name="is_frees" id="optionsRadios2" value="2" >
                            付钱
                        </label>
                    </div>
                </div>
            </div>



            <div id="attr">
                <button class="btn btn-sm btn-primary " type="submit" id="btn" ><strong>修改</strong>
                </button>
            </div>
        </form>
    </div>

    <script src="/js/layui/layui.all.js" charset="utf-8"></script>

    <script id="uploadContainer" name="content" style="width:100%;height:350px;display:none;" type="text/template"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        layui.use('upload', function() {

            var upload = layui.upload;
            //视频实例

            var uploadInst = upload.render({

                elem: '#test2' //绑定元素

                , url: '/audio' //上传接口

                , accept: 'file' //视频

                , method: 'post'

                , done: function (res) {

//上传完毕回调

//如果上传失败

                    if (res.code > 0) {

                        return layer.msg('上传失败');

                    }

//上传成功

                    document.getElementById('myAudioo').value = res.url;

                    layer.msg('上传成功')

                }

                , error: function () {

//请求异常回调

                }
            });
        });

    </script>
@endsection

