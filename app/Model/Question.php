<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
    public $timestamps = false;
    protected $table = 'question';
    protected $fillable = [
        'question_id','question_name','status','created_at'
    ];
}
