<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'work_time';

    /**
     * 複数代入可能な属性
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'start_time',
        'end_time'
    ];
}
