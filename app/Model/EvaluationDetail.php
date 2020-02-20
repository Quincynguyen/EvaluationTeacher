<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class EvaluationDetail extends Model
{
	public $timestamps = false;
    protected $table = 'evaluations_detail';
    protected $fillable = [
        'evaluations_detail_id','evaluation_id','question_id', 'answer_id'
    ];
}
