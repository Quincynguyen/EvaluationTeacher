@extends('layouts.masterdashboard')
@section('title', 'Danh Sách Sinh viên')
@section('content')
<h3 align="center" style="color: #224abe ">Danh sách Sinh viên chưa hoàn thành đánh giá</h3><br />
<table class="table table-bordered">
	<thead>
		<tr style="background-color: #4e73df;color: white;">
			<th>STT</th>
			<th>Mã Sinh viên</th>
			<th>Tên Sinh Viên</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<?php  $i = 0  ?>
		@foreach($result_student_not_feedback as $data)
		
		<?php  $i++  ?>
		<tr style="color: black;">
			<td>{{$i}}</td>
			<td>{{$data->username}}</td>
			<td>{{$data->name}}</td>
			<td><a class ="btn btn-info" href="">Nhắc nhở</a></td>
		</tr>
		@endforeach
	</tbody>
</table> 
@endsection