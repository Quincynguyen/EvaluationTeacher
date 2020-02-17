<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Evaluation extends Model
{
	public $timestamps = false;
    protected $table = 'evaluation';
    protected $fillable = [
        'evaluation_id','users_id','subject_id', 'total_point', 'note', 'created_at'
    ];
}
