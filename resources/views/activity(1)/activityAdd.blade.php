@extends('admin/layouts/main')


@section('title', '活动添加')




@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">添加活动</h4>
                <form action="/activityAdddo" method="post" class="forms-sample" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">活动标题:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ag_title" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">活动内容:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="exampleTextarea1" name="ag_content" rows="4" id="introduce"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">优惠的课程 : </label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="course_id" name="course_id">
                                        @foreach($data as $k=>$v)
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
                                <label class="col-sm-3 col-form-label">优惠价格:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="exampleTextarea1" name="act_price" rows="4" id="introduce"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="nav-link" href="/lectAdd"> -->
                    <input type="submit" class="btn btn-gradient-primary mr-2" value="添加">
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection