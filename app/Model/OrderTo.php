<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderTo extends Model
{
    protected $table='order_to';
    protected $primaryKey='o_id';
    public $timestamps=false;
}
