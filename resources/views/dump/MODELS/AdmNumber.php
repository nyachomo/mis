<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmNumber extends Model
{
    use HasFactory;
    protected $table="adm_numbers";

    protected $fillable=[
       'number',
       'status',
    ];

    
}
