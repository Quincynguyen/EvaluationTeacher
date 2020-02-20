<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Class extends Model
{
	public $timestamps = false;
    protected $table = 'class';
    protected $fillable = [
        'class_id','class_code','subject_id', 'teacher_id', 'semester'
    ];
}
