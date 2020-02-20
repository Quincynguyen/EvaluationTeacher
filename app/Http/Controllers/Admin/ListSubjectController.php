<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon;
class ListSubjectController extends Controller
{
  public function getAllSubject(Request $req)
  {
       $subject = DB::table('subject')->get();
       return view('admin.listsubject')->with('subject',$subject);
  }
  public function getListClass(Request $req)
  {

    $subjectId = $req->id;
   
     $class = DB::table('class')
          
          ->join('subject', 'class.subject_id', '=', 'subject.subject_id')
               ->join('teacher', 'class.teacher_id', '=', 'teacher.teacher_id')
      
          ->where([
              ['class.subject_id', '=', $subjectId],
            
          ])
           ->select('class.class_id', 'class.class_code','subject.subject_code','subject.subject_name','teacher.teacher_name','class.semester')
            ->get();


     return view('admin.listclass')->with('class', $class);
  }
}
          
