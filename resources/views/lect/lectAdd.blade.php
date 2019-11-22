@extends('admin/layouts/main')


@section('title', '讲师添加')




@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">添加讲师</h4>
                <form action="/lectAdddo" method="post" class="forms-sample" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">讲师名称:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="lect_name" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">讲师个人简历:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="exampleTextarea1" name="lect_resume" rows="4" id="introduce"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">讲师授课风格:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="exampleTextarea1" name="lect_style" rows="4" id="introduce"></textarea>
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