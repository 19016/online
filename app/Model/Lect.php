<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lect extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'lect';
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $primaryKey = 'lect_id';
    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;
}
