<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ispitni_rok extends Model
{
    protected $table = 'ispitni_rok';
    
    protected $fillable = ['predmet_id', 'vrijeme_odrzavanja', 'prijava_do', 'predmet_id', 'sezona_id', 'odjava_do'];

    public function predmet()
    {
        return $this->belongsTo('App\User', 'predmet_id');
    }

    public function sezona()
    {
        return $this->belongsTo('App\User', 'sezona_id');
    }
}
