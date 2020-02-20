<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    public $timestamps = false;
    protected $table = 'teacher';
    protected $fillable = [
        'teacher_id','teacher_name','faculty_id'
    ];
}
