@extends('layouts.masterdashboard')
@section('title', 'Statistical Class')
@section('content')
 	
  <!-- <title>Thống kê số lượng sinh viên đã tham gia đánh giá</title> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>
  
  <script type="text/javascript">
   var analytics = <?php echo $inputViewReport; ?>;
   var analytics1 = <?php echo $itemResult; ?>;

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var data1 = google.visualization.arrayToDataTable(analytics1);
    var options = {
     title : 'Biểu đồ thống kê đánh giá lớp'
    };
    var options1 = {
     title : 'Biểu đồ thông kê sinh viên tham gia đánh giá'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
       var chart1 = new google.visualization.PieChart(document.getElementById('pie_chart1'));
    chart.draw(data, options);
     chart1.draw(data1, options1);
   }
  </script>
  <br />
  <br>
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>
  
  
  <div class="container">
   <h3 align="center" style="color: #224abe ">Biểu đồ thông kê đánh giá lớp học</h3><br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Tỉ lệ đánh giá lớp học</h3>
       <h3 class="panel-title" style="margin-left:  800px;margin-right: 0x;font-size: 15px;">Giảng viên:   <span style="color: #224abe ">{{$classInfo->teacher_name}} </span></h3> <br>
        <h3 class="panel-title" style="margin-left:  800px;margin-right: 0x;font-size: 15px;">Môn học:   <span style="color: #224abe ">{{$classInfo->subject_name}} </span></h3><br>
         <h3 class="panel-title" style="margin-left:  800px;margin-right: 0x;font-size: 15px;">Tổng sinh viên của lớp:   <span style="color: #224abe ">{{$classInfo->total_student_in_class}} </span></h3><br>
         <h3 class="panel-title" style="margin-left:  800px;margin-right: 0x;font-size: 15px;">Tổng sinh viên tham gia đánh giá:   <span style="color: #224abe ">{{$classInfo->total_student_is_feedback_by_class}} </span></h3>
         
    </div>
    <div class="panel-body" align="center" style="position: relative;">
  
     <div id="pie_chart" style="width :50%; height:350px; margin: 10px;float:left;position: absolute;">
      
     </div>
     <div class="panel-body" align="center">
  
     <div id="pie_chart1" style="width:50%; height:350px; float: right;margin-top: 0px">
      
     </div>
    </div>
   </div>
   
  </div>
  <div>
   
  </div>
  <div class="container">
  </div>
  <div>
   
  </div>
        


 @endsection