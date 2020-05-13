<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
class ListTeacherController extends Controller
{
  public function getListTeacher(Request $req)
  {
     $faculty = DB::table('faculty')->get();
     return view('admin.listteacher')->with('faculty',$faculty);
  }
  public function postListTeacher( Request $req)
  {
  		// return $req->id;
  
  	  $teacher = DB::table('teacher')->where('faculty_id','=',$req->id)->get();
  	  return json_encode($teacher);
  }
   public function getPointTeacher( Request $req)
  {
  		$teacher_id = $req->id;
  		$sql = 'SELECT id  AS class_id, 
       class_code, 
       subject_code, 
       subject_name, 
       Sum(phan_tram) / ( Count(id) * 100 ) AS total 
       FROM   (SELECT e.class_id 
               AS id, 
               c.class_code 
               AS 
                      class_code, 
               s.subject_code 
               AS 
                      subject_code, 
               s.subject_name 
               AS 
                      subject_name, 
               e.users_id, 
               Count(e.users_id) 
               AS 
                      SO_CAU_HOI, 
               Sum(ed.answer_id) 
               AS 
                      total_point, 
               Sum(ed.answer_id) * 100 / ( Count(e.users_id) * (SELECT Count(*) 
                                                                FROM   answer) ) 
               AS 
                      PHAN_TRAM 
        FROM   evaluations e 
               INNER JOIN evaluations_detail ed 
                       ON e.evaluation_id = ed.evaluation_id 
               INNER JOIN class c 
                       ON e.class_id = c.class_id 
               INNER JOIN subject s 
                       ON c.subject_id = s.subject_id 
        WHERE  c.teacher_id = '.$teacher_id.'
        GROUP  BY e.users_id, 
                  e.class_id,
                  c.class_code,
                  s.subject_code,
                  s.subject_name) T 
         GROUP  BY id,
         			class_code,
         			subject_code,
         			subject_name';

           $results = DB::select($sql, array(1));

          return json_encode($results);
  }
 public function getAllPointByTeacher()
 {
 	 $faculty = DB::table('faculty')->get();
 	return view('admin.getallpoint')->with('faculty',$faculty);

 }

 public function getAllTeacherPoint(Request $req){
 	$faculty_id = $req->id;
 	$inputQuery = '';

 	if($faculty_id != null && $faculty_id > 0){
 		$inputQuery  = ' WHERE t.faculty_id = '.$faculty_id.' ';
	}

 	$sql ='SELECT t.teacher_id,t.teacher_name,f.faculty_name,SUM(total)/count( t.teacher_id) as total_final,"type" from (SELECT 
teacher_id,
		
       Sum(phan_tram) / ( Count(id) * 100 ) AS total 
FROM   (SELECT c.teacher_id as teacher_id , 
        e.class_id 
               AS id, 
               c.class_code 
               AS 
                      class_code, 
               s.subject_code 
               AS 
                      subject_code, 
               s.subject_name 
               AS 
                      subject_name, 
               e.users_id, 
               Count(e.users_id) 
               AS 
                      SO_CAU_HOI, 
               Sum(ed.answer_id) 
               AS 
                      total_point, 
               Sum(ed.answer_id) * 100 / ( Count(e.users_id) * (SELECT Count(*) 
                                                                FROM   answer) ) 
               AS 
                      PHAN_TRAM 
        FROM   evaluations e 
               INNER JOIN evaluations_detail ed 
                       ON e.evaluation_id = ed.evaluation_id 
               INNER JOIN class c 
                       ON e.class_id = c.class_id 
               INNER JOIN subject s 
                       ON c.subject_id = s.subject_id 
     GROUP  BY e.users_id, 
                  e.class_id,
                  c.class_code,
                  s.subject_code,
                  s.subject_name,
                  c.teacher_id) T 
         GROUP  BY id,
         			class_code,
         			subject_code,
         			subject_name,
         			T.teacher_id

         ) k LEFT JOIN teacher t on k.teacher_id = t.teacher_id 
         INNER JOIN faculty f on t.faculty_id = f.faculty_id'.$inputQuery.'

          GROUP BY t.teacher_id,k.teacher_id,t.teacher_name,f.faculty_name
          order by total_final desc';
           $results = DB::select($sql, array(1));

           if($results != null && count($results) > 0 ){
              $sql2 = 'SELECT * FROM option_set WHERE option_type = "POINT" ORDER BY option_value ';
		      $optionset = DB::select($sql2, array(1));
			    if($optionset != null && count($optionset) > 0 )
		      for ($i=0; $i <count($results) ; $i++) { 
		      	    $item = $results[$i];
		      	    $point = $item->total_final *100 ;
		      	for ($j=0; $j <count($optionset) ; $j++) { 
		      		$op = $optionset[$j];
		      		if($point >= $op->option_value ){
		      			$item->type = $op->option_code;
		      		}
		      	}
		      }
           }

          return json_encode($results);
 }

 public function getALlTypePoint(){
 	$sql = 'SELECT * FROM option_set WHERE option_type = "POINT" ORDER BY option_value ';
		$optionset = DB::select($sql, array(1));
		return json_encode($optionset);
 

 ;
 }
}
          
