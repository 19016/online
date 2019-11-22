<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Slie extends Model
{
    protected $table='slide';
    protected $primaryKey='slide_id';
    public $timestamps=false;
    protected $guarded=[];
}
