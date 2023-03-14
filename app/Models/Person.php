<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = ['person_name','date_of_birth' , 'age','gender','profile_image','disability_name'];
    protected $table = 'people';
}

// protected $fillable = ['person_name','date_of_birth' , 'age','gender','profile_image','disability_name'];