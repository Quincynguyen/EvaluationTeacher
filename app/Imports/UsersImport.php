<?php

namespace App\Imports;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if( isset($row['password'])){
       return new User([
            'name'     => $row,
            'username'    => $row, 
            'password' => bcrypt($row['password']),
            'role'    => $row, 
        ]);
            }

    }
}
