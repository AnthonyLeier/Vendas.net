<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
	use SoftDeletes;

    protected $table = 'tipos';
    protected $primaryKey = 'id';

    function produtos(){
    	return $this->hasMany('App\Produto', 'id_tipo', 'id');
    }
}
