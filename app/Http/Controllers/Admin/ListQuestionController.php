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
       $question = \App\Model\Question::Search()->paginate(16);
       return view('admin.listquestion')->with('question',$question);
  }
  public function addQuestion(Request $request)
  {
    $this->validate($request,[
            'question_name'=>'required',
        ],[
            'question_name.required'=>'Tên không được để trống',
        ]);
           $questions = Question::create([
                'question_name' => $request->question_name,
            ]);
            $questions->save();
            
             return redirect()->route('admin-question')->with('success','Cập nhật thành công nội dung câu hỏi'); 

  }
  public function postEdit(Request $request)
  {
        $this->validate($request,[
            'question_name'=>'required',
        ],[
            'question_name.required'=>'Nội dung câu hỏi không được để trống!',
        ]);
     
	    	$question =  \App\Model\Question::find($request->id);
	        $question->question_name = $request->question_name;

	        $question->save();

	       return redirect()->route('admin-question')->with('success','Câu hỏi đã được thêm mới!');  
 
}
public function deleteQuestion(Request $req)
    {
      $questions = Question::find($req->id);
      dd($questions);

      $questions->delete();
      return redirect()->route('admin-question')->with('success','Xóa thành công!'); 

    }
}
          
