@extends('admin.layouts.main')

@section('title', '后台首页')


@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">添加课程</h4>

                <form class="forms-sample" method="post" enctype="multipart/form-data" action="/classUpddo">
                    <input type="hidden" value="{{$data[0]['course_id']}}" name="course_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">讲师 : </label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="lect_id" name="lect_id">
                                        @foreach($teacher as $k=>$v)
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
                                <label class="col-sm-3 col-form-label">分类 : </label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="cate_id" name="cate_id">
                                        @foreach($category as $k=>$v)
                                            <option value="{{$v['cate_id']}}">{{$v['cate_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">课程名称:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="course_name" name="course_name" value="{{$data[0]['course_name']}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">课程价格:</label>
                                <div class="col-sm-9">
                                    @if($data[0]['is_free']==1)
                                        <input type="text" class="form-control" id="price" name="price" value="免费"/>
                                    @elseif($data[0]['is_free']==2)
                                        <input type="text" class="form-control" id="price" name="price" value="{{$data[0]['price']}}"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">总课时:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"id="hour" name="hour" value="{{$data[0]['course_hour']}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    课程状态  :
                    @if($data[0]['status']==1)
                        <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="1" checked>
                                    未开始
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="2" >
                                    连载中
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="3" >
                                    已完结
                                </label>
                            </div>
                        </div>
                    </div>
                    @elseif($data[0]['status']==2)
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="1">
                                        未开始
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="2" checked>
                                        连载中
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="3" >
                                        已完结
                                    </label>
                                </div>
                            </div>
                        </div>
                    @elseif($data[0]['status']==3)
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="1">
                                        未开始
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="2" >
                                        连载中
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="3" checked>
                                        已完结
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif


                    是否免费  :
                    @if($data[0]['is_free']==1)
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_free" id="optionsRadios1" value="1" checked>
                                    免费
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_free" id="optionsRadios2" value="2" >
                                    付钱
                                </label>
                            </div>
                        </div>
                    </div>
                    @elseif($data[0]['is_free']==2)
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="is_free" id="optionsRadios1" value="1">
                                        免费
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="is_free" id="optionsRadios2" value="2" checked>
                                        付钱
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">课程介绍 :</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"  rows="4" name="introduce" id="introduce" >{{$data[0]['jieshao']}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-gradient-primary mr-2" value="修改" id="btn">
                </form>
            </div>
        </div>
    </div>

@endsection
