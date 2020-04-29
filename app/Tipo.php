<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id';

    function produtos(){
    	return $this->hasMany('App\Produto', 'id_tipo', 'id');
    }
}
