<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Evaluations extends Model
{
	public $timestamps = false;
    protected $table = 'evaluations';
    protected $fillable = [
        'evaluation_id','users_id','class_id', 'status_feedback', 'note','total_point'
    ];
}
