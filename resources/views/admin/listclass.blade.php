@extends('layouts.masterdashboard')
@section('content')
 <h3 align="center" style="color: #224abe ">Danh sách tất cả các lớp học</h3><br />
 <table class="table table-striped">
 	<thead>
 		<tr  style="background-color: #4e73df;color: white;">
 			<th>STT</th>
 			<th>Mã lớp học</th>
 			<th>Tên môn học</th>
 			<th>Tên Giảng Viên</th>
 			<th>#</th>
 		</tr>
 	</thead>
 	<tbody>
 		 @foreach($class as $data)
 		<tr style="color: black;">
 			<td>{{$data->class_id}}</td>
 			<td>{{$data->class_code}}</td>
 			<td>{{$data->subject_name}}</td>
 			<td>{{$data->teacher_name}}</td>
 			<td><a class ="btn btn-info" href="{{route('admin-evaluationclass',['id'=>$data->class_id])}}"> Thống kê đánh giá lớp học</a></td>
 		</tr>
 		@endforeach
 	</tbody>
 </table>
 

 @endsection