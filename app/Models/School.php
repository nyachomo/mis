<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table="schools";
    protected $fillable=[
       'school_name',
       'school_location',
       'school_contact_person',
        'phonenumber',
    ];

    public function users(){
        return $this->hasMany(User::class,'school_id','id');
    }

    public function leeds(){
        return $this->hasMany(Leed::class,'school_id','id');
    }
}
