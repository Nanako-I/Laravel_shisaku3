<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temperature extends Model
{
    use HasFactory;
    protected $table = 'temperature';
    protected $fillable = ['temperature'];
}
