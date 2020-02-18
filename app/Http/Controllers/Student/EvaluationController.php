<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Model\Evaluation;
use App\Model\EvaluationResult;
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
        
      
        $subjectId = $req->id;
        // $subject = \App\Model\Subject::find($req->id);
        // var_dump( $subject);
        $questions  = DB::table('question')
       ->where('question.status', '=','1')
       ->get();

        $answers  = DB::table('answer')
       ->where('answer.status', '=','1')
       ->get();
        return view('student.evaluation')->with(['questions'=> $questions,'subjectId'=>$subjectId,'answers' => $answers]);

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
       
          // dd($req->all());
         $evaluation = Evaluation::create(['evaluation_id' => null,'users_id' => Auth::user()->id,'subject_id' => $req->id ,'total_point' => 0,'note' => $req->note,'created_at' => Carbon\Carbon::now('Asia/Ho_Chi_Minh')]);
        
          $evaluationId = $evaluation->id;
          $answerResutl = 0;
          $finalArray = array();
          $questionID  = 0;
          $total_point = 0;
           for($i = 0; $i <count($question); $i++){
            $answerResutl = $req->$i;
            $questionID = $question[$i]->question_id ;
            $total_point += $answerResutl;
              array_push($finalArray, array(
                'evaluation_id'=>$evaluationId, 
                'question_id'=>$questionID,
                'answer_id'=>$answerResutl
                
            
                ));
           }

          DB::table('evaluation')->where('evaluation_id',$evaluationId)->update(array(
                                 'total_point'=>$total_point,
           ));

           EvaluationResult::insert($finalArray);
          return redirect()->route('home')->with('success','Cảm ơn bạn đã đánh giá');
           //  success

}
}
          
