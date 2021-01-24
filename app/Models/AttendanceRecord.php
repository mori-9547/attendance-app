<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;
    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'attendance_records';

    /**
     * 複数代入可能な属性
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'status',
        'date',
        'attendanced_at',
        'leaved_at'
    ];

    protected $appends = ['work_hour'];

    /**
     * 出勤時間を返却する.
     *
     * @return string - work_hour
     */
    public function getWorkHourAttribute()
    {
        $start_time = Carbon::parse($this->attendanced_at);
        $end_time = Carbon::parse($this->leaved_at);

        $work_hour = $start_time->diffInHours($end_time);

        return $work_hour;
    }

}
