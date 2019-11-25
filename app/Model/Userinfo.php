<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    protected $table='user_info';
    protected $primaryKey='user_id';
    public $timestamps=false;
    protected $guarded=[];
}
