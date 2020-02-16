<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class OptionSet extends Model
{
    protected $table = 'option_set';
    protected $fillable = [
        'id','option_type','option_code','option_value'
    ];
    
}
