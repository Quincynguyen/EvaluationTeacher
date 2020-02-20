@extends('layouts.master')
@section('content')
	
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

 <!-- <form action="{{route('change-pass')}}" method="POST" role="form" style="border:1px solid;width: 60%;border-radius: 5px;margin-left: 200px;padding:20px" >
 	<legend>Thay Đổi Mật Khẩu</legend>
 
 	<div class="form-group">
 		<label for="">Nhập mật khẩu cũ</label>
 		<input type="password" class="form-control" name="password" placeholder="Mật khẩu cũ..."><br>
 		<label for="">Nhập mật khẩu mới</label>
 		<input type="password" class="form-control" name="password" placeholder="Mật khẩu cũ..."><br>
 		<label for="">Nhập lại mật khẩu mới: </label>
 		<input type="password" class="form-control" name="password" placeholder="Mật khẩu cũ..."><br>
 	</div>
 	
 	<button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
 </form> -->
 <div class="container">
    <div class="row">
        <h4>Thay đổi mật khẩu</h4>
        <div class="col-md-12">
            @if (session('status'))
                <p class="alert alert-success">{{ session('status') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
            <form class="form-horizontal" method="POST" action="{{route('change-pass')}}">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="current_password">Mật Khẩu hiện tại</label>
                    <input id="current_password" type="password" class="form-control" name="current_password" required placeholder="Nhập mật khẩu hiện tai">
                    @if ($errors->has('current_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
 
                <div class="form-group">
                    <label for="password">Mật khẩu mới: </label>
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Vui Lòng Nhập ít nhất 6 ký tự">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
 
                <div class="form-group">
                    <label for="password-confirm">Nhập lại mật khẩu mới: </label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Vui lòng xác nhận mật khẩu">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
 
                <div class="form-group">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary" type="submit">Thay đổi mật khẩu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection