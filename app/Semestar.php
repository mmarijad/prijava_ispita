<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semestar extends Model
{
    protected $table = 'semestar';
    
    protected $fillable = ['status', 'naziv_semestra'];
}
