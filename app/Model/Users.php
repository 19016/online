<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='user';
    protected $primaryKey='u_id';
    public $timestamps=false;
    protected $guarded=[];
}
