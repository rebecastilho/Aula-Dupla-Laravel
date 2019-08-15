<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    protected $table = "cliente";
    protected $fillable = ['nome', 'data_nascimento'];


    
}
