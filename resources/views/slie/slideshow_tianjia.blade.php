@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <form action="{{url('/slideshow_insert')}}" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>图片:</td>
                <td>
                    <input type="file" name="file" id="">
                </td>
            </tr>

            <tr>
                <td>权重:</td>
                <td>
                    <input type="text" name="name" id="">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="提交">
                </td>
            </tr>
        </table>
        
    </form>
@endsection