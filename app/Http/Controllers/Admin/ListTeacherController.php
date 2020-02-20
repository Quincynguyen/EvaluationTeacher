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
       $teacher = DB::table('teacher')->get();
       return view('admin.listteacher')->with('teacher',$teacher);
  }
 
}
          
