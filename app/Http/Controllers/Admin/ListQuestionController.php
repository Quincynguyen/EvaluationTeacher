<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Model\Question;
class ListQuestionController extends Controller
{
  public function getListQuestion(Request $req)
  {
       $question = DB::table('question')->get();
       return view('admin.listquestion')->with('question',$question);
  }
  public function postEdit(Request $request)
  {
        $this->validate($request,[
            'question_name'=>'required',
        ],[
            'question_name.required'=>'Nội dung câu hỏi không được để trống!',
        ]);
	    	$users =  \App\Model\Question::find($request->id);
	    	dd($users);
	        $question->question_name = $request->question_name;

	        $question->save();

	       return redirect()->route('admin.listquestion')->with('success','Câu hỏi đã được thêm mới!');  
 
}
}
          
