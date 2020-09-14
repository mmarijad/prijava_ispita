<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Predmet extends Model
{
    protected $table = 'predmet';
    
    protected $fillable = ['ime', 'ECTS', 'studij_id', 'nastavnik_id', 'semestar_id'];


    public function studij()
    {
        return $this->belongsTo('App\Studij', 'studij_id');
    }

    public function semestar()
    {
        return $this->belongsTo('App\Semestar', 'semestar_id');
    }

    public function nastavnik()
    {
        return $this->belongsTo('App\User', 'nastavnik_id');
    }

}
