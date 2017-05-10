<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enunciado extends Model
{
    public $timestamps = false;
    protected $fillable = ['questionario_id', 'descricao'];
}
