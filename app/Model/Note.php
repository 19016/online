<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table='note';
    protected $primaryKey='onte_id';
    public $timestamps=false;
}