<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class UsersSubject extends Model
{
    public $timestamps = false;
    protected $table = 'users_subject';
    protected $fillable = [
        'users_id','subject_id','teacher_code',
        'start_date','semester'
    ];

     public function subject()
    {
        return $this->belongsTo('App\Model\Subject');
    }
    public function getAllSubjectByUsersId(){
        $query = DB::table('users_subject')
				    ->select('users_subject.users_id,subject.subject_id,subject.subject_code,subject.subject_name,users_subject.semester ')
				    ->join('subject', 'users_subject.subject_id', '=', 'subject.subject_id')
				    ->get();
		return $query;
    }
}

