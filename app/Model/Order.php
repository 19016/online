<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';
    protected $primaryKey='order_id';
    public $timestamps=false;
}
