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
        'user_id'
    ];

    /**
     * キャストする属性
     *
     * @var array
     */
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'rest_time' => 'datetime'
    ];

    protected $appends = ['work_hour'];

    /**
     * 勤務時間を返却する.
     *
     * @return string - work_hour
     */
    public function getWorkHourAttribute()
    {
        $work_hour = $this->start_time->diffInHours($this->end_time);

        return $work_hour;
    }
}
