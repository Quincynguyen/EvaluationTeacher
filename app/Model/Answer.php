<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Answer extends Model
{
    public $timestamps = false;
    protected $table = 'answer';
    protected $fillable = [
        'answer_id','answer_name','status','created_at','point_answer'
    ];
}