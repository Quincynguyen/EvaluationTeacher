<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon;
class StatisticalClassController extends Controller
{
  public function getEvaluationClass(Request $req)
  {
     //dd($req->id);
 

// lay thong tin lop hoc
    $classId = $req->id;

   

    // lay thong tin giao vien
    $TeacherAndSubject = DB::table('class')

    ->join('subject', 'class.subject_id', '=', 'subject.subject_id')
    ->join('teacher', 'class.teacher_id', '=', 'teacher.teacher_id')

    ->where([
      ['class.class_id', '=', $classId],

    ])
    ->select('class.class_id', 'class.class_code','subject.subject_code','subject.subject_name','teacher.teacher_name','class.semester')
    ->get();
    $classInfo = (Object) array(['teacher_name' => 'Is null',"class_code" =>'Is null',"subject_name"=>"Is null",'total_student_in_class' => 0,'total_student_is_feedback_by_class'=> 0]);

    if( $TeacherAndSubject != null &&  count($TeacherAndSubject) > 0){
      $item =  $TeacherAndSubject[0];
      $classInfo->teacher_name = $item->teacher_name;
      $classInfo->class_code = $item->class_code;
      $classInfo->subject_name = $item->subject_name;
    }

// lay si so lop

     $sqlGetTotalStudentInClass = 'SELECT count(*) as total_student_in_class from (SELECT COUNT(e.users_id) as id from evaluations e WHERE e.class_id = 
      '.$classId.'
      GROUP BY e.users_id) t'; 
    
    $resultsGetTotalStudentInClass = DB::select($sqlGetTotalStudentInClass, array(1));

 if( $resultsGetTotalStudentInClass != null &&  count($resultsGetTotalStudentInClass) > 0){
      $item =  $resultsGetTotalStudentInClass[0];
      $classInfo->total_student_in_class = $item->total_student_in_class;
    
    }
// lay so luong sinh vien tham gia danh gia cua lop hoc
    $sqltotal_student_is_feedback_by_class = 'SELECT COUNT(*) as total_student_is_feedback_by_class from (SELECT COUNT(e.users_id) as total from evaluations_detail ed INNER JOIN evaluations e on ed.evaluation_id = e.evaluation_id WHERE e.class_id = '.$classId.'
GROUP by e.users_id) t;'; 
 $results_total_student_is_feedback_by_class = DB::select($sqltotal_student_is_feedback_by_class, array(1));

 if( $results_total_student_is_feedback_by_class != null &&  count($results_total_student_is_feedback_by_class) > 0){
      $item =  $results_total_student_is_feedback_by_class[0];
      $classInfo->total_student_is_feedback_by_class = $item->total_student_is_feedback_by_class;
    
    }

// thong ke danh gia lop hoc
        $sql = 'select a.answer_name, if(t.total is null, 0, t.total) as countAnswer
        from (select ed.answer_id, count(ed.answer_id) as total
        from evaluations e
        inner join evaluations_detail ed on e.evaluation_id = ed.evaluation_id

        where class_id = '.$classId.'
        group by ed.answer_id) t
        right join answer a on a.answer_id = t.answer_id;'; 
        $results = DB::select($sql, array(1));
   

    
       $array[] = ['Answer name', 'Number'];
 
      if( $results != null &&  count($results) > 0){

          for ($i=0; $i <count($results)  ; $i++) { 
            $item = $results[$i];
              $array[$i+1] =   [ $item->answer_name,  $item->countAnswer];
          }

        // Thong ke so luong thanh vien trong lop hoc tham gia danh gia
   
        //  khoi tao 1 mang 2 phan tu doan nay ung vs id =0 
             $array1[] = ['So luong','Number'];
             if( $classInfo != null && $classInfo->total_student_is_feedback_by_class > -1
                && $classInfo->total_student_in_class > -1)
              {
                 $array1[1] =   ['Số sinh viên đã tham gia đánh giá', $classInfo->total_student_is_feedback_by_class];
                 $array1[2] =   ['Số sinh viên chưa tham gia đánh giá', $classInfo->total_student_in_class -  $classInfo->total_student_is_feedback_by_class];
             }
           
      
 }

       // $array[] = ['Mo ta', 'Number'];
 

//khi nay classInfo k bao gio null
     return view('admin.evaluationclass')->with('inputViewReport', json_encode($array))->with('itemResult',json_encode($array1))->with('classInfo',$classInfo);
       
  }

}

          
