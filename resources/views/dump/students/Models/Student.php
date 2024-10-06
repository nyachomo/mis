<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table='students';
    protected $fillable=[
        'student_admno',
        'student_fullname',
        'student_email',
        'phone',
        'student_gender',
        'profile_image',
        'student_status',
       'department_id',
       'clas_id',

    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    protected function educations(){
        return $this->hasMany(EducationExperience::class);
    }

    protected function works(){
        return $this->hasMany(WorkExperience::class);
    }

    protected function referees(){
        return $this->hasMany(Referee::class);
    }

    protected function student_profile_documents(){
        return $this->hasMany(StudentProfileDocument::class);
    }
    protected function professional_summaries(){
        return $this->hasMany(ProfessionalSummary::class);
    }

    protected function student_skills(){
        return $this->hasMany(StudentSkill::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses', 'student_id', 'course_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function clas(){
        return $this->belongsTo(Clas::class,'clas_id');
    }
    
    


}
