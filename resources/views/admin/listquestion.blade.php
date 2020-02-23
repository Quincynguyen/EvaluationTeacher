@extends('layouts.masterdashboard')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success" style="height: 50px;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>{{Session::get('success')}}</strong> 
</div>
@endif
<h3 align="center" style="color: #224abe ">Danh sách tất cả các câu hỏi đánh giá</h3><br />
 <a class="btn btn-primary" data-toggle="modal" href='#modal-id' style="margin-bottom: 20px;">Thêm mới câu hỏi</a>
 <div class="modal fade" id="modal-id">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       </div>
       <div class="modal-body">
         <form action="{{route('admin-addquestion')}}" method="POST" role="form">
          <legend style="color: red;">Thêm mới câu hỏi</legend>
          @csrf
          <div class="form-group">
            <label for="">Nội dung câu hỏi</label>
            <input type="text" name="question_name" class="form-control" id="question_name" placeholder="Nhập nội dung câu hỏi" required="text">
            @if($errors->has('question_name'))
            {{$errors->first('question_name')}}
            @endif
          </div>
          <input type="hidden" name="question_id" class="form-control" id="id" placeholder="id" >

          <div class="form-group">
            <button type="submit" class="btn btn-primary" style="background-color: #4e73df;border: solid 1px;border-radius: 5px;">Lưu</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <form style="float: right;" action="" method="GET" class="form-inline" role="form">
   @csrf
   <div class="form-group">
     <label class="sr-only" for="">label</label>
     <input type="text" class="form-control" name="search" placeholder="Tìm kiếm câu hỏi">
   </div>
   <button style="margin-left: 5px;" type="submit" class="btn btn-primary">Tìm kiếm</button>
 </form>
 <table class="table table-striped">
  	<thead>
  		<tr style="background-color: #4e73df;color: white;">
  			<th>STT</th>
  			<th>Tên câu hỏi</th>
  			<th>#</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($question as $data)
  		<tr style="color: black;">
  			
  			<td>{{$data->question_id}}</td>
  			<td>{{$data->question_name}}</td>
  			<td><a  data-toggle="modal" href='#modal-edit' href="{{route('admin-editquestion',['id'=>$data->question_id])}}"><i class="far fa-edit"></i></a>
          <div class="modal fade" id="modal-edit">
             <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     </div>
                     <div class="modal-body">
                      <form action="{{route('admin-editquestion')}}" method="POST" role="form">
                      @csrf
                      <div class="form-group">
                        <legend style="color: red;">Chỉnh sửa nội dung câu hỏi</legend>
                         <div class="form-group">
                            <input type=""class="form-control" id="{{$data->question_id}}" placeholder="" value = "{{$data->question_id}}" >
                        </div>
                         <div class="form-group">
                          <input type="text" name="question_name" class="form-control" id="question_name" value = "{{$data->question_name}}" required>
                          @if($errors->has('question_name'))
                          {{$errors->first('question_name')}}
                          @endif
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #4e73df;border: solid 1px;border-radius: 5px;">Sửa</button>
                      </div>
                    </form>
                      </div>
                    </div>
                  </div>
          </div>
           <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route('admin-deletequestion',['id'=>$data->question_id])}}"><i style="color: red" class="far fa-trash-alt"></i></a>
        </td>
  		</tr>
  	   @endforeach
   
  	</tbody>
  </table>
  {{$question->links()}}
 @endsection