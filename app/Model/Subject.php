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
     public function scopeSearch($query){
        if(!empty(request()->search)) {
            return $query->where('subject_name','like','%'.request()->search.'%');
        }
        else{
            return $query;
        }
       }
    
}
