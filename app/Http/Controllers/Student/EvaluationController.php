<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;

class EvaluationController extends Controller
{
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFormEvaluation(Request $req)
    {
        // var_dump($req->id);die;
        $questions  = DB::table('question')
       ->where('question.status', '=','1')
       ->get();

        $answers  = DB::table('answer')
       ->where('answer.status', '=','1')
       ->get();
        return view('student.evaluation')->with('questions', $questions)->with('answers', $answers);

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
               return redirect()->route('form-evaluation')->with('error','Fasle');  
            }




       
       

    }
        
}
