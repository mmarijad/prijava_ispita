<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sezona extends Model
{
    protected $table = 'sezona';
    
    protected $fillable = ['sezona'];
}
