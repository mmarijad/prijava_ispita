<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prijava extends Model
{
    protected $table = 'prijava';
    
    protected $fillable = ['datum_prijave', 'brojac_prijava', 'student_id', 'ispit_id', 'status', 'ocjena'];
}
