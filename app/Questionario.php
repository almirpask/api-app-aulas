<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    public $timestamps = false;
    public $fillable = ['disciplina_id', 'educador'];
}
