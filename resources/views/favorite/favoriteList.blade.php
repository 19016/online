@extends('admin.layouts.main')

@section('title', '收藏夹展示')


@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">收藏夹</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            用户
                        </th>
                        <th>
                            收藏夹名称
                        </th>
                        <th>
                            收藏数量
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($favorite as $k=>$v)
                    <tr class="table-danger">
                        <td>
                            {{$v['u_name']}}
                        </td>
                        <td>
                            {{$v['f_name']}}
                        </td>
                        <td>
                            {{$v['f_num']}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection