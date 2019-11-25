<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table='response';
    protected $primaryKey='r_id';
    public $timestamps=false;
}
