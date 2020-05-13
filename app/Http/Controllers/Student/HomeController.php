<?php

namespace App\Http\Controllers\Student;

// use App\Models\StudentClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Carbon;
use \App\User;
use App\Http\Requests\ChangePasswordRequest;
class HomeController extends Controller
{
     public function __construct() {
    	$this->middleware('auth',['except'=>'getLogout']);
    }
    public function getIndex() {
     $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
      $year = $now->year;
      $month = $now->month;
       $semestersByOptionType  = DB::table('option_set')
       ->where('option_set.option_type', '=','SEMESTER_CODE')
       ->get();

        $semester1 = '9,1';
        $semester2 = '2,8';
        $resultSemester = $year.'HK1';
        $semes = 'HK2';

        foreach ($semestersByOptionType as $value) {
         
          if ($value->option_code  == 'HK1') {
            $semester1 = $value->option_value;
          }if ($value->option_code  == 'HK2') {
            $semester2 = $value->option_value;
          }
       }

      $minMaxSemester1 = explode(',', trim($semester1));
      $minMaxSemester2 = explode(',', trim($semester2));
      $startSemester1 = $minMaxSemester1[0];
      $endSemester1 = $minMaxSemester1[1];
      $startSemester2 = $minMaxSemester2[0];
      $endSemester2 = $minMaxSemester2[1];
     

      if( $month > $startSemester2 +1 && $month < $endSemester2+1){
//  hoc ki 2
        $resultSemester = ($year-1).'HK2';
        $semes = "HK2 ".($year-1)."-".$year;

      }else{
        $semes = "HK1 ".($year-1)."-".$year;
        if($month > $endSemester2 ){
          $resultSemester = $year.'HK1';
        }else{
           $resultSemester = ($year -1).'HK1';
        }
      }

      $subject = DB::table('evaluations')
              ->join('class', 'evaluations.class_id', '=', 'class.class_id')
          ->join('subject', 'class.subject_id', '=', 'subject.subject_id')
               ->join('teacher', 'class.teacher_id', '=', 'teacher.teacher_id')
          ->leftJoin('evaluations_detail','evaluations.evaluation_id', '=', 'evaluations_detail.evaluation_id')
            
          ->where([
              ['users_id', '=', Auth::user()->id],
              ['evaluations_detail.evaluation_id', '=',null],
              ['class.semester', '=', $resultSemester],
          ])
           ->select('users_id', 'evaluations.evaluation_id', 'subject.subject_id','subject.subject_code','subject.subject_name','teacher.teacher_name','class.semester')
            ->get();
      return view('student.home')->with('subject', $subject)->with('semes', $semes);
      // return view('student.home');
    }
    public function getLogout() {
   	Auth::logout();
   	return redirect()->route('student-login');
	}
  public function postSubject(Request $req)
  {
     $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
      $year = $now->year;
      $month = $now->month;
       $semestersByOptionType  = DB::table('option_set')
       ->where('option_set.option_type', '=','SEMESTER_CODE')
       ->get();

        $semester1 = '9,1';
        $semester2 = '2,8';
        $resultSemester = $year.'HK1';
        $semes = 'HK2';

        foreach ($semestersByOptionType as $value) {
         
          if ($value->option_code  == 'HK1') {
            # code...
            $semester1 = $value->option_value;
          }if ($value->option_code  == 'HK2') {
            # code...
            $semester2 = $value->option_value;
          }
       }

      $minMaxSemester1 = explode(',', trim($semester1));
      $minMaxSemester2 = explode(',', trim($semester2));
      $startSemester1 = $minMaxSemester1[0];
      $endSemester1 = $minMaxSemester1[1];
      $startSemester2 = $minMaxSemester2[0];
      $endSemester2 = $minMaxSemester2[1];
     

      if( $month > $startSemester2 +1 && $month < $endSemester2+1){
//  hoc ki 2
        $resultSemester = ($year-1).'HK2';
        $semes = "HK2 ".($year-1)."-".$year;

      }else{
        $semes = "HK1 ".($year-1)."-".$year;
        if($month > $endSemester2 ){
          $resultSemester = $year.'HK1';
        }else{
           $resultSemester = ($year -1).'HK1';
        }
      }
      
     
       $subject = DB::table('evaluations')
              ->join('class', 'evaluations.class_id', '=', 'class.class_id')
          ->join('subject', 'class.subject_id', '=', 'subject.subject_id')
               ->join('teacher', 'class.teacher_id', '=', 'teacher.teacher_id')
          ->leftJoin('evaluations_detail','evaluations.evaluation_id', '=', 'evaluations_detail.evaluation_id')
            
          ->where([
              ['users_id', '=', Auth::user()->id],
              ['evaluations_detail.evaluation_id', '=',null],
              ['class.semester', '=', $resultSemester],
          ])
           ->select('users_id', 'evaluations.evaluation_id', 'subject.subject_id','subject.subject_code','subject.subject_name','teacher.teacher_name','class.semester')
            ->get();


         for($i = 0; $i <count($subject); $i++){
            $evaluation_id = $req->$i;
             return redirect()->route('form-evaluation')->with('evaluation_id',$evaluation_id);
         }
  }
  public function getChangePass()
  {
     return view('student.changepass')->with(
            ['id' => Auth::user()->id]
        );
  }
  public function changePass(ChangePasswordRequest $req)
  {
       if(Auth::Check())
        {  
            if(\Hash::check($req->current_password,Auth::User()->password))
               {
          $user = User::find(Auth::user()->id)->update(["password"=> bcrypt($req->password)]);      
        }
        else{
          return redirect()->back()->with('alert-danger','Mật khẩu không chính xác!');
        }
      }
        return redirect()->route('student-login')->with('alert-success','Mật khẩu đã thay đổi thành công !');

  }
  public function getListQuestion()
  {
      $listquestion = DB::table('question')->get();
      return view('student.listquestion')->with('listquestion',$listquestion); 
  }
  public function getStudentGuide()
  {
    return view('student.studentguide');
  }

  // SELECT us.users_id,s.subject_id,s.subject_code,s.subject_name,us.semester FROM users_subject as us inner join subject as s on us.subject_id = s.subject_id WHERE users_id = 1 and us.semester = '2019HK1'
}
