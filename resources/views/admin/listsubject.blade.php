@extends('layouts.masterdashboard')
@section('content')
<h3 align="center" style="color: #224abe ">Danh sách tất cả các môn học</h3><br />
 <form style="float: right;" action="" method="GET" class="form-inline" role="form">
   @csrf
   <div class="form-group">
     <label class="sr-only" for="">label</label>
     <input type="text" class="form-control" name="search" placeholder="Tìm kiếm môn học">
   </div>
   <button style="margin-left: 5px;" type="submit" class="btn btn-primary">Tìm kiếm</button>
 </form>
 <div class = "form-group">
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
      <?php  $i = 0  ?>
      @foreach($subject as $data)
      <?php  $i++  ?>
  		<tr style="color: black;">
  			
  			<td>{{$i}}</td>
  			<td>{{$data->subject_code}}</td>
  			<td>{{$data->subject_name}}</td>
  			<td><a class ="btn btn-info" href="{{route('admin-class',['id'=>$data->subject_id])}}">Danh sách lớp học</a></td>
  		</tr>
  	   @endforeach
   
  	</tbody>
  </table>
</div>
   {{$subject->links()}}
 @endsection