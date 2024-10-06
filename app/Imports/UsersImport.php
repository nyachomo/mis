<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel,WithHeadingRow, WithChunkReading, WithBatchInserts
{
    protected $departmentId;

    public function __construct($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    public function model(array $row)
    {
        $password=12345678;
        if (!User::where('email', $row['email'])->exists() && !User::where('user_phonenumber', $row['phonenumber'])->exists()) {
            return new User([
                'department_id' => $this->departmentId,
                'user_firstname' => $row['firstname'],
                'user_secondname' => $row['secondname'],
                'user_surname' => $row['surname'],
                'user_phonenumber' => $row['phonenumber'],
                'email' => $row['email'],
                'password' => Hash::make($password),
                'is_trainer' => 'Yes',
            ]);
        }else{
            
             return null;
        }
       

       
    }

    public function chunkSize(): int
    {
        return 300; // Adjust chunk size as needed
    }

    /**
     * Set the batch size.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 200; // Adjust batch size as needed
    }

}
