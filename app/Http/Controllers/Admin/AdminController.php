<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
   
   public function getStudent()
   {
    // select (select count(*) as total_feedback
    //          from (select u.id as id, count(u.id) as total_sub
    //          from users u
    //          left join evaluations e on u.id = e.users_id
    //          group by u.id) m
    //          left join (select id, count(id) as total_feed
    //          from (select ed.users_id as id
    //          from evaluations_detail e
    //          inner join evaluations ed on e.evaluation_id = ed.evaluation_id
    //          group by e.evaluation_id, ed.users_id) a
    //          group by id) k
    //          on m.id = k.id
    //          where m.total_sub = k.total_feed
    //          and m.total_sub > 0) as total_student_is_feedback,
    //          count(*)
    //          as total_student
    //          from users u';
   	// thong ke sv
     $sql =	'select (select count(*) as total_feedback
             from (select u.id as id, count(u.id) as total_sub
             from users u
             left join evaluations e on u.id = e.users_id
             group by u.id) m
             left join (select id, count(id) as total_feed
             from (select ed.users_id as id
             from evaluations_detail e
             inner join evaluations ed on e.evaluation_id = ed.evaluation_id
             group by e.evaluation_id, ed.users_id) a
             group by id) k
             on m.id = k.id
             where m.total_sub = k.total_feed
             and m.total_sub > 0) as total_student_is_feedback,
             count(*)
             as total_student
             from users u where u.role = "STUDENT"'; 
      $results = DB::select($sql, array(1));

    
      $inputViewReport = (object) array(
             'total_student_is_feedback' => 0, 
             'total_student' => 0,
             'percentStudentIsFeedback' => 0
        );
//  khoi tao 1 mang 2 phan tu doan nay ung vs id =0 
       $array[] = ['Mo ta', 'Number'];
 

      if( $results != null &&  count($results) > 0){
          $total_student_is_feedback =  $results[0]->total_student_is_feedback;
          $total_student =  $results[0]->total_student;



          $array[1] =   ['Đã đánh giá', $total_student_is_feedback];
          $array[2] =   ['Chưa đánh giá', $total_student -  $total_student_is_feedback];

          //  $percentStudentIsFeedback = $total_student_is_feedback/$total_student;

          // $inputViewReport->total_student_is_feedback = $total_student_is_feedback;
          // $inputViewReport->total_student = $total_student;
          // $inputViewReport->percentStudentIsFeedback = $percentStudentIsFeedback;

        
      }
      
   return view('admin.dashboard')->with('inputViewReport', json_encode($array));

   }

}
