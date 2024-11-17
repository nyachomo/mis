<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Department;

class Clas extends Model
{
    use HasFactory;

    protected $table="clas";
    protected $fillable=[
       'clas_name',
       'clas_status',
       'department_id',
       'timetable',
    ];

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function students(){
        return $this->hasMany(Student::class,'clas_id','id');
    }

    public function exams(){
        return $this->hasMany(Exam::class,'clas_id','id');
    }
    public function users(){
        return $this->hasMany(User::class,'clas_id','id');
    }

    public function cats(){
        return $this->hasMany(StudentCat::class,'clas_id','id');
    }

}
