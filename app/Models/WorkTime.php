<?php

namespace App\Models;

use Carbon\Carbon;
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
        'end_time',
        'rest_time'
    ];

    protected $appends = ['work_hour'];

    /**
     * 勤務時間を返却する.
     *
     * @return string - work_hour
     */
    public function getWorkHourAttribute()
    {
        $start_time = Carbon::parse($this->start_time);
        $end_time = Carbon::parse($this->end_time);

        $work_hour = $start_time->diffInHours($end_time);

        return $work_hour;
    }
}
