<?php
namespace App\Http\Controllers\Admin;
  use Illuminate\Http\Request;
  use DB;
  use App\Http\Controllers\Controller;
  use App\Imports\UsersImport;
  use Excel;
  class ImportExcelController extends Controller
  {
    function getViewImportUsers()
    {
     $data = DB::table('users')->orderBy('id', 'DESC')->get();
     return view('admin.importexcel', compact('data'));
   }

   function getImportUsers(Request $request)
   {

     $this->validate($request, [
      'select_users'  => 'required|mimes:xls,xlsx'
    ]);
            $path = $request->select_users->getRealPath();
            // Excel::import(new UsersImport,request()->file('select_users'));

            $data = Excel::load($path)->get();

            // if($data->count() > 0)
            // {
            //   foreach($data->toArray() as $key => $value)
            //   {
               foreach($data as $row)
               {
         //        if (!empty($row)) {
                    $insert_data[] = array(
                     'name'  => $row['name'],
                     'username'   => $row['username'],
                     'password'   =>bcrypt($row['password']),
                     'role'   => $row['role'],
                     
                   );
                }
         //     }
         //   }
         //   if (isset($insert_data['name'])){
         //   $insert_data['name'] =  DB::connection()->getPdo()->quote(utf8_encode($insert_data['name']));
         //   $insert_data['username'] =  DB::connection()->getPdo()->quote(utf8_encode($insert_data['username']));
         //   $insert_data['password'] =  DB::connection()->getPdo()->quote(utf8_encode($insert_data['password']));
         //   }
           if(!empty($insert_data))
           {
             DB::table('users')->insert($insert_data);
           }
         // }
          // }
     return back()->with('success', 'Thêm mới thành công!');
}
    public function getImportSubject(Request $request)
    {
        $this->validate($request, [
      'select_subject'  => 'required|mimes:xls,xlsx'
    ]);
            $path = $request->select_subject->getRealPath();
           

            $data = Excel::load($path)->get();
               foreach($data as $row)
               {
                    $insert_data[] = array(
                     'subject_code'  => $row['subject_code'],
                     'subject_name'   => $row['subject_name'],
                   );
                }
    
           if(!empty($insert_data))
           {
             DB::table('subject')->insert($insert_data);
           }
     return back()->with('success', 'Thêm mới thành công!');
    }
    public function getImportUsersFaculty(Request $request)
    {
        $this->validate($request, [
      'select_users_faculty'  => 'required|mimes:xls,xlsx'
    ]);
            $path = $request->select_users_faculty->getRealPath();
           

            $data = Excel::load($path)->get();
               foreach($data as $row)
               {
                    $insert_data[] = array(
                     'subject_code'  => $row['subject_code'],
                     'subject_name'   => $row['subject_name'],
                   );
                }
    
           if(!empty($insert_data))
           {
             DB::table('subject')->insert($insert_data);
           }
     return back()->with('success', 'Thêm mới thành công!');
    }
    public function getImportFaculty(Request $request)
    {
      $this->validate($request, [
      'select_faculty'  => 'required|mimes:xls,xlsx'
    ]);
            $path = $request->select_faculty->getRealPath();
           

            $data = Excel::load($path)->get();
               foreach($data as $row)
               {
                    $insert_data[] = array(
                     'faculty_code'  => $row['faculty_code'],
                     'faculty_name'   => $row['faculty_name'],
                   );
                }
    
           if(!empty($insert_data))
           {
             DB::table('faculty')->insert($insert_data);
           }
     return back()->with('success', 'Thêm mới thành công!');
    }
     public function getImportTeacher(Request $request)
    {
      $this->validate($request, [
      'select_teacher'  => 'required|mimes:xls,xlsx'
    ]);
            $path = $request->select_teacher->getRealPath();
           

            $data = Excel::load($path)->get();
               foreach($data as $row)
               {
                    $insert_data[] = array(
                     'teacher_name'  => $row['teacher_name'],
                     'faculty_id'   => $row['faculty_id'],
                   );
                }
    
           if(!empty($insert_data))
           {
             DB::table('teacher')->insert($insert_data);
           }
     return back()->with('success', 'Thêm mới thành công!');
    }
}

