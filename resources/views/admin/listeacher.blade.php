@extends('layouts.masterdashboard')
@section('content')
<h3 align="center">Danh sách tất cả các môn học</h3><br />
  <table class="table table-bordered">
  	<thead>
      <tr> <th>Khoa: </th></tr>
  		<tr>
  			<th>STT</th>
  			<th>Mã Giáo viên</th>
  			<th>Tên Giáo Viên</th>
  			<th>#</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($teacher as $data)
  		<tr>
  			
  			<td>{{$data->teacher_id}}</td>
  			<td>{{$data->teacher_code}}</td>
  			<td>{{$data->teacher_name}}</td>
  			<td><a class ="btn btn-info" href="">Thống kê Giảng Viên</a></td>
  		</tr>
  	   @endforeach
    
  	</tbody>
  </table>
 @endsection