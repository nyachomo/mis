<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class TraineeImport implements ToModel, WithHeadingRow
{
    protected $departmentId;
    protected $classId;

    public function __construct($departmentId, $classId)
    {
        $this->departmentId = $departmentId;
        $this->classId = $classId;
    }
    
    public function model(array $row)
    {
        $password=12345678;
        if (!User::where('email', $row['email'])->exists() && !User::where('user_phonenumber', $row['phonenumber'])->exists()) {
            return new User([
                'department_id' => $this->departmentId,
                'clas_id'     => $this->classId,
                'user_firstname' => $row['firstname'],
                'user_secondname' => $row['secondname'],
                'user_surname' => $row['surname'],
                'user_phonenumber' => $row['phonenumber'],
                'email' => $row['email'],
                'password' => Hash::make($password),
                'is_trainee' => 'Yes',
            ]);
        }else{
            
             return null;
        }
    }
}
