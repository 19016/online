@extends('admin/layouts/main')


@section('title', '支付方式添加')




@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">添加支付方式</h4>
                <form action="/payAdddo" method="post" class="forms-sample" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">支付方式名称：</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="exampleTextarea1" name="pay_name" rows="4" id="introduce"></textarea>
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