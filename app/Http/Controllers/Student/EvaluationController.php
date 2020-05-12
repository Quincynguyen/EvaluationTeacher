<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Model\Evaluations;
use App\Model\EvaluationDetail;
use DB;
use Carbon;
class EvaluationController extends Controller
{
  
   protected $subjectId;
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFormEvaluation(Request $req)
    {
        
      
        $evaluationId = $req->id;
     

     $teacherAndClass = DB::table('evaluations')
              ->join('class', 'evaluations.class_id', '=', 'class.class_id')
              ->join('subject', 'class.subject_id', '=', 'subject.subject_id')
              ->join('teacher', 'class.teacher_id', '=', 'teacher.teacher_id')
              ->where([
                       ['evaluations.evaluation_id', '=', $evaluationId],
                        ])
              ->select('subject.subject_name','teacher.teacher_name','class.semester')
              ->first();
        
        // $subject = \App\Model\Subject::find($req->id);
        $questions  = DB::table('question')
       ->where('question.status', '=','1')
       ->get();
       // $subject = DB::table('subject')->where('subject_id',$subjectId)->first();
       // $teacher = DB::table('teacher')->first();

        $answers  = DB::table('answer')
       ->where('answer.status', '=','1')
       ->get();
        return view('student.evaluation')->with(['questions'=> $questions,'evaluationId'=>$evaluationId,'answers' => $answers,'subject'=>  'null','teacher'=>'null','teacherAndClass'=>$teacherAndClass]);

    }
    public function postFormEvaluation( Request $req)
    {


        $question  = DB::table('question')
       ->where('question.status', '=','1')
       ->get();

       $checkError = false;
        for($i = 0; $i <count($question); $i++){
            $answerResutl = $req->$i;
        
              if(!$answerResutl)
              {
                $checkError = true;
                break;
              }
          }
            if( $checkError){
               return redirect()->route('form-evaluation')->with('error','Bạn cần chọn đầy đủ câu trả lời');  
            }

            // pass

            // save evalution success and save evalution_result

            //  note get form , created_at now, total_point = sum answer
        
          $answerResutl = 0;
          $finalArray = array();
          $questionID  = 0;
          $total_point = 0;
          $eId = $req->id;
           for($i = 0; $i <count($question); $i++){
            $answerResutl = $req->$i;
            $questionID = $question[$i]->question_id ;
            $total_point += $answerResutl;
              array_push($finalArray, array(
                'evaluations_detail_id'=>null, 
                  'evaluation_id'=>$req->id, 
                'question_id'=>$questionID,
                'answer_id'=>$answerResutl
            
                ));
           }

          

           $sql = 'UPDATE evaluations SET total_point = '.$total_point.', note = '.'"'.$req->note.'"'.' WHERE evaluation_id = '.$eId.';' ; 
          DB::select($sql, array(1));


           EvaluationDetail::insert($finalArray);
          return redirect()->route('home')->with('success','Cảm ơn bạn đã đánh giá');
           //  success

}
}
          
