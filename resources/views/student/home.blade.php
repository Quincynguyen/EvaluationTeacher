@extends('layouts.master')
@section('title', 'Phần mềm đánh giá giảng viên')
@section('content')
<h2 style="text-align: center;color: green;">Lấy ý kiến phản hồi từ người học đối với giảng viên</h2>
		<p style="text-align: justify ;font-size: 18px;font-style: italic;font-family: initial;margin-left: 250px;margin-top: 50px;">Để cải thiện và nâng cao chất lượng dạy và học, đề nghị các anh/chị học viên, sinh viên cho ý kiến về các nội dung dưới đây. <br>Thông tin về người cho ý kiến sẽ được hoàn toàn giữ bí mật.</p>
		<form action="{{route('post-subject')}}" method="POST" role="form">
		 @csrf
		<table class="table table-hover" style ="width: 75%;margin-left: 250px;margin-top: 50px;">
			<thead>
				<tr>
					
					<th>Mã môn</th>
					<th>Tên môn học</th>
					<th>Giảng Viên</th>
					<th>Học kỳ</th>
					<th>#</th>
				</tr>
			</thead>
		
			<tbody>

             @for($i = 0; $i < count($subject) ; $i++)
				
				<tr>
				
					<td>{{$subject[$i]->subject_code}}</td>
					<td>{{$subject[$i]->subject_name}}</td>
					<td>{{$subject[$i]->teacher_name}}</td>
					<td>{{$semes}}</td>
					<td>&nbsp;&nbsp;</td>

					<td>
						<div>
							<!-- <input class= "btn btn-info" type="submit" name="{{$i}}" value="{{$subject[$i]->subject_id}}"> -->
							<a class="btn btn-xs btn-primary" href="{{route('get-form-evaluation',['id'=>$subject[$i]->subject_id])}}">Bấm vào đây để đánh giá
						</a>
						</div>
					</td>
					
				</tr>
				@endfor
			</tbody>
		</table>
</form>
@endsection