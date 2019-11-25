@extends('admin/layouts/main')

@section('title', '后台首页')

@section('content')
    <form action="{{url('/slide_update')}}" method="post">
    <table class="table">
        <input type="hidden" name="slide_id" value="{{$slide->slide_id}}">
      <tr>
          <td>
              <input type="text" name="name" value="{{$slide->slide_weight}}" id="">
          </td>
          <td>
              <input type="submit" value="修改">
          </td>
      </tr>
    </table>
    </form>
@endsection