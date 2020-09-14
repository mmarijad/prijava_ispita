<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Studij extends Model
{
    use SoftDeletes;

    protected $table = 'studij';
    
    protected $fillable = ['naziv', 'opis'];
}
