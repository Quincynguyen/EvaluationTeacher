<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon;
class StudentController extends Controller
{
  public function getListStudent(Request $req)
  {
       // $subject = DB::table('subject')->get();
       // return view('admin.listsubject')->with('subject',$subject);

  	$sql = 'select u.id, u.name,  u.username,count(u.id) as total_class_not_feedback
  	from evaluations e
  	left join evaluations_detail ed on e.evaluation_id = ed.evaluation_id
  	inner join users u on e.users_id = u.id
  	where ed.evaluation_id is null
  	group by u.id, u.name,u.username';
  	$result_student_not_feedback = DB::select($sql, array(1));

     return view('admin.liststudent')->with('result_student_not_feedback',$result_student_not_feedback);
  	}
}
          
