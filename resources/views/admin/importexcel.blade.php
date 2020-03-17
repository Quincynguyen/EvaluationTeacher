@extends('layouts.masterdashboard')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" style="height: 50px;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>{{Session::get('success')}}</strong> 
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-error" style="height: 50px;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>{{Session::get('error')}}</strong> 
</div>
@endif
@if(count($errors) > 0)
<div class="alert alert-danger">
 Upload Validation Error<br><br>
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif
<h3 align="center" style="font-style: all;color: #4e73df">Thêm dữ liệu</h3>

<div class="row">
  <div class="col-md-6">
    <form method="post" enctype="multipart/form-data" action="{{route('admin-importusers')}}">
      {{ csrf_field() }}
      <div class="form-group">
       <table class="table">
        <tr>
          <td width="0">
            <input type="file" name="select_users" /><br><br>
            <span> <p style="color: red;">* chỉ những file có định dạng .xls, .xslx</p></span>
            <input type="submit" name="upload" class="btn btn-primary" value="Thêm Sinh viên">
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>

<!-- import môn học -->

<div class="row">
  <div class="col-md-6">
    <form method="post" enctype="multipart/form-data" action="{{route('admin-importsubject')}}">
      {{ csrf_field() }}
      <div class="form-group">
       <table class="table">
        <tr>
          <td width="0">
            <input type="file" name="select_subject" /><br><br>
            <span> <p style="color: red;">* chỉ những file có định dạng .xls, .xslx</p></span>
            <input type="submit" name="upload-subject" class="btn btn-primary" value="Thêm môn học">
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>
<!-- import user-facuty -->
<div class="row">
  <div class="col-md-6">
    <form method="post" enctype="multipart/form-data" action="{{route('admin-importusersfaculty')}}">
      {{ csrf_field() }}
      <div class="form-group">
       <table class="table">
        <tr>
          <td width="0">
            <input type="file" name="select_users_faculty" /><br><br>
            <span> <p style="color: red;">* chỉ những file có định dạng .xls, .xslx</p></span>
            <input type="submit" name="upload-users-faculty" class="btn btn-primary" value="Sinh viên-Khoa">
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>
<!-- import faculty -->
<div class="row">
  <div class="col-md-6">
    <form method="post" enctype="multipart/form-data" action="{{route('admin-importfaculty')}}">
      {{ csrf_field() }}
      <div class="form-group">
       <table class="table">
        <tr>
          <td width="0">
            <input type="file" name="select_faculty" /><br><br>
            <span> <p style="color: red;">* chỉ những file có định dạng .xls, .xslx</p></span>
            <input type="submit" name="upload-faculty" class="btn btn-primary" value="Khoa">
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>
<!-- import teacher -->
<div class="row">
  <div class="col-md-6">
    <form method="post" enctype="multipart/form-data" action="{{route('admin-importteacher')}}">
      {{ csrf_field() }}
      <div class="form-group">
       <table class="table">
        <tr>
          <td width="0">
            <input type="file" name="select_teacher" /><br><br>
            <span> <p style="color: red;">* chỉ những file có định dạng .xls, .xslx</p></span>
            <input type="submit" name="upload-teacher" class="btn btn-primary" value="Giáo viên">
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>
@endsection