<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Faculty extends Model
{
    public $timestamps = false;
    protected $table = 'subject';
    protected $fillable = [
        'faculty_id','faculty_code','faculty_name'
    ];
}
