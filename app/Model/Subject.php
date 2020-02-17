<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Subject extends Model
{
    public $timestamps = false;
    protected $table = 'subject';
    protected $fillable = [
        'subject_id','subject_code','subject_name'
    ];
    
}
