@extends('layouts.master')
@section('content')

<h3 align="center" style="color: gray;font-family:arial;font-weight: bold; ">Danh sách các câu hỏi cần đánh giá</h3><br />
	<table class="table table-striped" style="width: 80%;margin-left: 100px;">

		<thead>
			<tr style="background-color: #91a7b4;color: #16387c">
				<th>STT</th>
				<th>Giảng viên thực hiện hoạt động giảng dạy như sau:</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listquestion as $data)
			<tr>
				<td>{{$data->question_id}}</td>
				<td>{{$data->question_name}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection