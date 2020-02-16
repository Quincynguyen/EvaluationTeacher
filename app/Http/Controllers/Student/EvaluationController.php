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
    public function getFormEvaluation()
    {
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

        $questi  = DB::table('question')
       ->where('question.status', '=','1')
       ->get();



       $checkError = false;
        for($i = 0; $i <count($questi); $i++){
            $answerResutl = $req->$i;
           
              if(!$answerResutl)
              {
                $checkError = true;
                break;
              }
             
            }

            if( $checkError){
               return redirect()->back()->withError('message','Update Successful');  
            }




       
       

    }
        
}
