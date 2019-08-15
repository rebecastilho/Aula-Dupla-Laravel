<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendedor extends Model
{
    protected $table = 'vendedor';
    protected $fillable = ['nome', 'salario', 'cliente_id'];
    
    use SoftDeletes;

    public function cliente(){
        return  $this->belongsTo('App\Cliente');
    }
}
