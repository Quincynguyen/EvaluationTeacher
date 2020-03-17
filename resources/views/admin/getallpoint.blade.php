@extends('layouts.masterdashboard')
@section('content')
<script type="text/javascript">
 
   

	window.onload = function() {
     
        var eSelect = document.getElementById('sel');

        var urlAll = 'http://localhost:81/EvaluationTeacher/public/admin/getAllTeacherPoint';
        eSelect.onchange = function() {
        	
        	if(eSelect.selectedIndex == 0){
                getPoint(urlAll);
            }else{
              var urlNew = 'http://localhost:81/EvaluationTeacher/public/admin/getAllTeacherPoint?id='.concat(eSelect.selectedIndex);
              getPoint(urlNew);
          }
          
      }
      getPoint(urlAll);
      

  }

  function getPoint(url){
    $.ajax({
        url:url,
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
          console.log(result);
          builderTable(result);
          
      }
  });
}
function builderTable(result){

   var output = document.getElementById('body_table');
   output.innerHTML = '';
   
   var tableContent ='';
   for (var i = 0; i<result.length ; i++) {
       tableContent += '<tr>';
       var item = result[i];
       tableContent += "<td>" + (i+1) + "</td>";
       tableContent += "<td>" + item['teacher_name'] + "</td>";
       tableContent += "<td>" + item['faculty_name'] + "</td>";
       tableContent += "<td>" + item['total_final']*100+ "</td>";
       tableContent += "<td>" + item['type'] + "</td>";
       tableContent += '</tr>';
   }
   
   output.innerHTML += tableContent;
}
</script>

<select id="sel" >
   <option id="0"  value="0">-ALL-</option>
   @foreach($faculty as $data)
   <option id="{{$data->faculty_id}}"  value="{{$data->faculty_id}}">{{$data->faculty_name}}</option>
   @endforeach
   
</select>
<table class="table table-hover">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên giáo viên</th>
			<th>Khoa</th>
			<th>Diem</th>
			<th>Loai</th>
		</tr>
	</thead>
	<tbody id ="body_table">
		
		
	</tbody>
</table>
@endsection