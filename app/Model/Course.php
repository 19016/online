<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = "course";
    protected $primaryKey = "course_id";
    public $timestamps = false;
    protected $guarded = [];
    /*public $timestamps=false;*/
}
