<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
	use SoftDeletes;
	
    protected $table = 'clientes';
    protected $primaryKey = 'id';
 	
 	function vendas(){
 		return $this->hasMany('App\Venda', 'id_cliente', 'id');
 	}
}
