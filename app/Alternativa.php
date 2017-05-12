<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    public $timestamps = false;
    protected $fillable = ['enunciado_id','resposta_id', 'status'];
}
