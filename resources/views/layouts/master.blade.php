<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
		
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="{{url('')}}/js/evaluation.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div style ="background-image: url('{{ asset('student/bg-head.png') }}');" class ="row">
		<img style ="padding-left: 100px; height: 130px;" src="{{ asset('student/logo.jpg') }}">
	</div>
	<div class ="row header">
		<ul style ="background-color: #2e6da4;list-style-type: none;width: 100%;height: 50px;">
	      <li style=" float:left;padding-left: 160px;padding-top: 15px;font-style: bold;"><a style="color:#FFF;" class="active" href="#"><i class="fas fa-home"></i> TRANG CHỦ</a></li>
	      <li style=" float:left;padding-left: 160px;padding-top: 15px;font-style: bold;"><a style="color:#FFF;" href="#"><i class="fas fa-newspaper"></i>  PHIẾU ĐĂNG KÝ ĐÁNH GIÁ</a></li>
	      <li style=" float:left;padding-left: 160px;padding-top: 15px;"><a style="color:#FFF;" href="#"> <i class="fas fa-laptop-code"></i>  KHÓA HỌC CỦA TÔI</a></li>
	      <li style=" float:left;padding-left: 160px;padding-top: 15px;"><a style="color:#FFF;" href="#"><i class="fas fa-book-reader"></i>  HƯỚNG DẪN ĐĂNG KÝ ĐÁNH GIÁ</a></li>
	       <li class="nav navbar-nav navbar-right dropdown">
					<a style="color:#FFF;margin-right: 120px;"href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a  href="">Đăng xuất</a></li>
					</ul>
				</li>
   		 </ul>
	</div>
	<div class ="row header" style="width: 100%;margin-left: 100px">
 		@yield('content')
 	</div>

	<div class ="row" style ="margin-top:90px;background-color: #cccccccc;text-align: center;font-size: 15px;font-family: initial;">
		<span> Copyright ©2019 Trường Đại học Sư phạm Hà Nội
			<br>
			Phần mềm được phát triển bởi Quynh NT</span>

	</div>
</body>
</html>