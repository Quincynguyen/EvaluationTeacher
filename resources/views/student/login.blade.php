<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<meta id="MetaKeywords" name="KEYWORDS" content="Phần mềm lấy ý kiến đánh giá">
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div style ="background-image: url('{{ asset('student/bg-head.png') }}');" class ="row">
		<img style ="padding-left: 100px; height: 130px;" src="{{ asset('student/logo.jpg') }}">
	</div>
	<div class ="row">
		<ul style ="background-color: #2e6da4;list-style-type: none;width: 100%;height: 50px;">
	      <li style=" float:left;padding-left: 160px;padding-top: 10px;font-style: bold;"><a style="color:#FFF;" class="active" href="#"><i class="fas fa-home"></i>TRANG CHỦ</a></li>
	      <li style=" float:left;padding-left: 160px;padding-top: 10px;font-style: bold;"><a style="color:#FFF;" href="#"><i class="fas fa-newspaper"></i>  PHIẾU ĐĂNG KÝ ĐÁNH GIÁ</a></li>
	      <li style=" float:left;padding-left: 160px;padding-top: 10px;"><a style="color:#FFF;" href="#"><i class="fas fa-laptop-code"></i>  KHÓA HỌC CỦA TÔI</a></li>
	      <li style=" float:left;padding-left: 160px;padding-top: 10px;"><a style="color:#FFF;" href="#"> <i class="fas fa-book-reader"></i>  HƯỚNG DẪN ĐĂNG KÝ ĐÁNH GIÁ</a></li>
   		 </ul>
	</div>
	<div style ="margin-top: 80px; border:solid 0.5px #ccc;padding: 30px;border-radius: 5px;" class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="{{route('student-login')}}" method="POST" role="form">
					<legend>Đăng nhập</legend>
					@if($errors->has('errorlogin'))
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{$errors->first('errorlogin')}}
						</div>
					@endif
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{old('username')}}">
						@if($errors->has('username'))
							<p style="color:red">{{$errors->first('username')}}</p>
						@endif
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						@if($errors->has('password'))
							<p style="color:red">{{$errors->first('password')}}</p>
						@endif
					</div>
				
					
					{!! csrf_field() !!}
					<input type="checkbox" name="rememner">&nbsp; Remember me <br><br>
					<button type="submit" class="btn btn-primary">Đăng nhập</button>
				</form>
			</div>
		</div>
	</div>
	<div class ="row" style ="margin-top:90px;background-color: #cccccccc;text-align: center;font-size: 15px;font-family: initial;">
		<span> Copyright ©2019 Trường Đại học Sư phạm Hà Nội
			<br>
			Phần mềm được phát triển bởi Quynh NT</span>

	</div>
</body>
</html>