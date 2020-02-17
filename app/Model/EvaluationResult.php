<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class EvaluationResult extends Model
{
    protected $table = 'evaluation_result';
    protected $fillable = [
        'evaluation_id','question_id','answer_id'
    ];
}


