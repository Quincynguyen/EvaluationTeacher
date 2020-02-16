<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class UsersFaculty extends Model
{
    public $timestamps = false;
    protected $table = 'users_faculty';
    protected $fillable = [
        'users_id','faculty_id','created'
    ];
}
