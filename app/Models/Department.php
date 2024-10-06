<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table="departments";
    protected $fillable=[
       'department_name',
       'department_status',
    ];

    public function clases(){
        return $this->hasMany(Clas::class,'department_id','id');
    }

    public function courses(){
        return $this->hasMany(Course::class,'department_id','id');
    }

    public function students(){
        return $this->hasMany(Student::class,'department_id','id');
    }

    public function exams(){
        return $this->hasMany(Exam::class,'department_id','id');
    }

    public function cats(){
        return $this->hasMany(StudentCat::class,'department_id','id');
    }
    public function users(){
        return $this->hasMany(User::class,'department_id','id');
    }
}

