<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ocjene extends Model
{
    protected $table = 'ocjene';
    
    protected $fillable = ['ocjena', 'predmet_id', 'student_id', 'vrijeme_polaganja'];

}
