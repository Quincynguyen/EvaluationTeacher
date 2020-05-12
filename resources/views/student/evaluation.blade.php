@extends('layouts.master')
@section('content')
	
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
	<div class="row content">
		 <form name="feedback" onsubmit="return validate()" action="{{route('form-evaluation')}}" method="POST" role="form">
		 @csrf
		<h2 style="text-align: center;color: green;">Lấy ý kiến phản hồi từ người học đối với giảng viên</h2>
		<p style =" text-align: center; font-size: 18px;">Hãy chọn các nút tương ứng theo các mức độ đánh giá từ 1 - 5 như sau: </p>
		<ul class ="title" style ="color:orange;list-style-type: none;padding-top: 20px;margin-left:-50px;">
			<li style ="float:left; margin-left: 500px;font-style: italic;font-family: initial;font-size: 20px;">1 = Cần cải thiện</li>
			<li  style ="float:left; padding-left: 25px;font-style: italic;font-family: initial;font-size: 20px">2 = Đạt</li>
			<li  style ="float:left; padding-left: 25px;font-style: italic;font-family: initial;font-size: 20px">3 = Khá</li>
			<li  style ="float:left; padding-left: 25px;font-style: italic;font-family: initial;font-size: 20px">4 = Tốt</li>
			<li  style ="float:left; padding-left: 25px;font-style: italic;font-family: initial;font-size: 20px">5 = Xuất sắc</li>
		</ul>
		<table class="table table-dark" style="width: 70%;margin-left: 150px;">
			<thead>
				<tr>
					<th>Giảng viên đánh giá:  <span style="color: #2e6da4;">{{$teacherAndClass->teacher_name}}</span><br><br>
					Môn học đánh giá: <span style="color: #2e6da4;">{{$teacherAndClass->subject_name}}</span></th>
				</tr>
				<tr style="background-color: #CCC">
					
					<th>STT</th>
					<th>Giảng viên thực hiện hoạt động giảng dạy như sau:</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th>
						<tr>
							<td></td>
							<td></td>
							@foreach($answers as $item)
							<td>{{$item->answer_id}}</td>
							@endforeach
						</tr>
					</th>
				</tr>
			</thead>
			<tbody>
				@for($i = 0; $i < count($questions) ; $i++)
				<tr>
					<td> {{$questions[$i]->question_id}}</td>
					<td> {{$questions[$i]->question_name}}</td>
					
					@foreach($answers as $item)
					 <td><input type="radio" name="{{$i}}" value="{{$item->answer_id}}"></td>
					 <!-- <input type="radio" name="{{$i}}" value="{{ old('$item->answer_id') }}"> -->
					@endforeach
				  </tr>
				@endfor
			</tbody>
		</table>
		<div style="display: inline-flex; padding-left: 300px; width: 100%">
			Ý kiến góp ý khác: &nbsp;
			<textarea name="note" style="overflow: auto; width: 60%" >
			</textarea>
		</div>
		<input type="hidden" value="{{$evaluationId}}" name="id">
		<div style="text-align: center; padding-top: 2%"><input class= "btn btn-info" type="submit" name="submit" value="Gửi"></div>
	</div>
	</form>
		
	</div>
	<script type="text/javascript">
		function validate() {
			var form = document.forms["feedback"];
			var count = 0;
			for(var i = 0; i < 80; i++) {
				if (form[i].checked) count++;
			}
			console.log(count);
			if (count < 16) {
				alert("Vui lòng tích đủ số câu hỏi");
				return false;
			}
		}
	</script>
@endsection
	