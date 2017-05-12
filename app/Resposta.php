<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    public $timestamps = false;
    protected $fillable = ['alternativa_id', 'status'];
    
}
