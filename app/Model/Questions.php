<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table='questions';
    protected $primaryKey='issue_id';
    public $timestamps=false;
}
