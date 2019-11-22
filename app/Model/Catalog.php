<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table='catalog';
    protected $primaryKey='catelog_id';
    public $timestamps=false;
    protected $guarded=[];
}
