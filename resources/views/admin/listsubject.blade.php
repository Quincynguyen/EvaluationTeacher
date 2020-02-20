@extends('layouts.masterdashboard')
@section('content')
<h3 align="center" style="color: #224abe ">Danh sách tất cả các môn học</h3><br />
  <table class="table table-striped">
  	<thead>
  		<tr style="background-color: #4e73df;color: white;">
  			<th>STT</th>
  			<th>Mã môn học</th>
  			<th>Tên môn học</th>
  			<th>#</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($subject as $data)
  		<tr style="color: black;">
  			
  			<td>{{$data->subject_id}}</td>
  			<td>{{$data->subject_code}}</td>
  			<td>{{$data->subject_name}}</td>
  			<td><a class ="btn btn-info" href="{{route('admin-class',['id'=>$data->subject_id])}}">Danh sách lớp học</a></td>
  		</tr>
  	   @endforeach
    
  	</tbody>
  </table>
 @endsection