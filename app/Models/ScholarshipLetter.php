<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipLetter extends Model
{
    use HasFactory;
    protected $table="scholarship_letters";
    protected $fillable=[
       "scholarship_letter",
       "clas",
    ];
}
