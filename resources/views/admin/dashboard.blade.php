@extends('layouts.masterdashboard')
@section('title', 'Admin')
@section('content')
 	
       <!DOCTYPE html>
<html>
 <head>
  <!-- <title>Thống kê số lượng sinh viên đã tham gia đánh giá</title> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>
  <!-- <script type="text/javascript">
   var analytics = <?php echo $inputViewReport; ?>//mang k echo dc

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var inputViewReport = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Tỉ lệ sinh viên tham gia đanh giá '
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script> -->
    <script type="text/javascript">
   var analytics = <?php echo $inputViewReport; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Tỉ lệ sinh viên tham gia đánh giá'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center" style="font-style: all;color: #4e73df">Biểu đồ thông kê số lượng sinh viên tham gia đánh giá</h3><br>
   <div class="panel-heading" style="background-color: #1EAE98;border-radius: 5px;margin-bottom:0px;padding: 30px;width: 1100px;">
    </div>
   
   <div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body" align="center" style="border-bottom-right-radius: all;color: #f6c23e">
     <div id="pie_chart" style="width:1100px; height:450px;margin-right: 100px;">

     </div>
    </div>
   </div>
   
  </div>
 </body>
</html>
        


 @endsection