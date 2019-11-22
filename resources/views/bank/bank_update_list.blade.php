@extends('admin/layouts/main')

@section('title', '后台首页')


@section('content')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Horizontal Two column</h4>
                <form class="form-sample" method="post" action="bank_update_do">
                    <input type="hidden" name="bank_id" value="{{$bank_list[0]['bank_id']}}">
                    <p class="card-description">Personal info</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">课程</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="course_id">
                                        <option value="{{$bank_list[0]['course_id']}}">{{$bank_list[0]['course_name']}}</option>
                                        <option>请选择</option>
                                        @foreach($course as $k=>$v)
                                            <option value="{{$v['course_id']}}">{{$v['course_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">讲师</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="lect_id">
                                        <option value="{{$bank_list[0]['lect_id']}}">{{$bank_list[0]['lect_name']}}</option>
                                        <option>请选择</option>
                                        @foreach($lect as $k=>$v)
                                            <option value="{{$v['lect_id']}}">{{$v['lect_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">类型</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="bank_type" id="sele">
                                        <option value="{{$bank_list[0]['bank_type']}}">
                                            @if($bank_list[0]['bank_type']==1)
                                                单选
                                            @elseif($bank_list[0]['bank_type']==2)
                                                多选
                                            @elseif($bank_list[0]['bank_type']==3)
                                                填空
                                            @elseif($bank_list[0]['bank_type']==4)
                                                判断
                                            @endif
                                        </option>
                                        <option value="0">请选择</option>
                                        <option value="1">单选</option>
                                        <option value="2">多选</option>
                                        <option value="3">填空</option>
                                        <option value="4">判断</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>

                    </div>
                    <div class="row ass">

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">答案</label>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="bank_answer">{{$bank_list[0]['bank_answer']}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="jquery.min.js"></script>
    <script>
        $(document).on("change","#sele",function(){
            var type=$(this).val();
            // alert(type);
            var text='';
            if(type == 1){
                text="<div class=\"form-group\">\n" +
                    "                      <label for=\"exampleTextarea1\">题目</label>\n" +
                    "                      <textarea class=\"form-control\" id=\"exampleTextarea1\" rows=\"4\" name='bank_name'>{{$bank_list[0]['bank_name']}}</textarea>\n" +
                    "                    </div>    <div class=\"form-group\">\n" +
                    "                      <label for=\"exampleInputPassword4\">A</label>\n" +
                    "                      <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword4\" placeholder=\"\" name='choose_A' value='{{$bank_list[0]['choose_A']}}']}}'>\n" +
                    "                    </div>  </br>  <div class=\"form-group\">\n" +
                    "                      <label for=\"exampleInputPassword4\">B</label>\n" +
                    "                      <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword4\" placeholder=\"\" name='choose_B' value='{{$bank_list[0]['choose_B']}}'>\n" +
                    "                    </div>    <div class=\"form-group\">\n" +
                    "                      <label for=\"exampleInputPassword4\">C</label>\n" +
                    "                      <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword4\" placeholder=\"\" name='choose_C' value='{{$bank_list[0]['choose_C']}}'>\n" +
                    "                    </div>    <div class=\"form-group\">\n" +
                    "                      <label for=\"exampleInputPassword4\">D</label>\n" +
                    "                      <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword4\" placeholder=\"\" name='choose_D'value='{{$bank_list[0]['choose_D']}}'>\n" +
                    "                    </div>";
                $(".ass").empty();
                $(".ass").append(text);
            }else if(type == 2){
                text="<div class=\"form-group\">\n" +
                    "                      <label for=\"exampleTextarea1\">题目</label>\n" +
                    "                      <textarea class=\"form-control\" id=\"exampleTextarea1\" rows=\"4\" name='bank_name'>{{$bank_list[0]['bank_name']}}</textarea>\n" +
                    "                    </div>    <div class=\"form-group\">\n" +
                    "                      <label for=\"exampleInputPassword4\">A</label>\n" +
                    "                      <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword4\" placeholder=\"\" name='choose_A' value='{{$bank_list[0]['choose_A']}}'>\n" +
                    "                    </div>  </br>  <div class=\"form-group\">\n" +
                    "                      <label for=\"exampleInputPassword4\">B</label>\n" +
                    "                      <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword4\" placeholder=\"\" name='choose_B' value='{{$bank_list[0]['choose_B']}}'>\n" +
                    "                    </div>    <div class=\"form-group\">\n" +
                    "                      <label for=\"exampleInputPassword4\">C</label>\n" +
                    "                      <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword4\" placeholder=\"\" name='choose_C' value='{{$bank_list[0]['choose_C']}}'>\n" +
                    "                    </div>    <div class=\"form-group\">\n" +
                    "                      <label for=\"exampleInputPassword4\">D</label>\n" +
                    "                      <input type=\"text\" class=\"form-control\" id=\"exampleInputPassword4\" placeholder=\"\" name='choose_D' value='{{$bank_list[0]['choose_D']}}'>\n" +
                    "                    </div>";
                $(".ass").empty();
                $(".ass").append(text);
            }else if(type == 3){
                text = "<div class=\"form-group\">\n" +
                    "                      <label for=\"exampleTextarea1\">题目</label>\n" +
                    "                      <textarea class=\"form-control\" id=\"exampleTextarea1\" rows=\"4\" name='bank_name'>{{$bank_list[0]['bank_name']}}</textarea>\n"
                "</div>"
                $(".ass").empty();
                $(".ass").append(text);
            }else if(type == 4){
                text = "<div class=\"form-group\">\n" +
                    "                      <label for=\"exampleTextarea1\">题目</label>\n" +
                    "                      <textarea class=\"form-control\" id=\"exampleTextarea1\" rows=\"4\" name='bank_name'>{{$bank_list[0]['bank_name']}}</textarea>\n"
                "</div>"
                $(".ass").empty();
                $(".ass").append(text);

            }
        })

    </script>
@endsection