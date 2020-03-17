@extends('layouts.masterdashboard')
@section('content')
<!-- <title>Thống kê số lượng sinh viên đã tham gia đánh giá</title> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
 google.charts.load('current', {'packages':['corechart']});
 
 

 window.onload = function() {
   
  var eSelect = document.getElementById('sel');

  var urlDefault = 'http://localhost:81/EvaluationTeacher/public/admin/getlistteacher?id=1';
  eSelect.onchange = function() {
    var url = 'http://localhost:81/EvaluationTeacher/public/admin/getlistteacher?id='.concat(eSelect.selectedIndex+1);
    myFunction(url);
  }
  myFunction(urlDefault);

  var eteacher = document.getElementById('teacher');
  eteacher.onchange = function() {
   var teacher_id = $("#teacher option:selected").attr("id");
   getPointByTeacherId(teacher_id);
 }
 

 
}
function getPointByTeacherId(teacher_id){
 $.ajax({
  url:'http://localhost:81/EvaluationTeacher/public/admin/getPointByTeacher?id='.concat(teacher_id),
  contentType: "application/json",
  dataType: 'json',
  success: function(result){
    
   google.charts.setOnLoadCallback(drawChart(result));
 }
});

}
function drawChart(result) {
 console.log(result);
 var input = [["Element", "Density", { role: "style" }]
 ];

 for (var i = 0; i<result.length ; i++) {
   var item = result[i];
   input[i+1] = [item['subject_name'], parseFloat(item['total'])*100, "#b87333"]
 }

 var data = google.visualization.arrayToDataTable(input);

 var view = new google.visualization.DataView(data);
 view.setColumns([0, 1,2]);

 var options = {
  title: "Density of Precious Metals, in g/cm^3",
  width: 600,
  height: 400,
  bar: {groupWidth: "95%"},
  legend: { position: "none" },
};
var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
chart.draw(view, options);
}


function myFunction(url) {

  $.ajax({
    url:url,
    contentType: "application/json",
    dataType: 'json',
    success: function(result){
      
      addListTeacher(result);
    }
  });
}

function addListTeacher( data){
  var eSelect = document.getElementById('teacher');
  while (eSelect.length > 0) {
   eSelect.remove(0);
 }
 for(var i = 0;i<data.length ;  i++){

   var item = data[i];
   var option = document.createElement("option");
   option.setAttribute("id",item['teacher_id'] );
   option.text = item['teacher_name'];
   eSelect.add(option);

 }
 var teacher_id = $("#teacher option:selected").attr("id");
 getPointByTeacherId(teacher_id)
}

</script>
<label for="cars">Danh sach Khoa: </label>

<select id="sel" >

	@foreach($faculty as $data)
 <option id="{{$data->faculty_id}}"  value="{{$data->faculty_id}}">{{$data->faculty_name}}</option>
 @endforeach
 
</select>
<select id="teacher" >
</select>
<body>
 <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
</body>

@endsection