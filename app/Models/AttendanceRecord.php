<?php

namespace App\Models;

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
    ];

    /**
     * キャストする属性
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'attendanced_at' => 'datetime',
        'leaved_at' => 'datetime'
    ];

    /**
     * 出勤時間を返却する.
     *
     * @return string - work_hour
     */
    public function getWorkHourAttribute()
    {
        $work_hour = $this->attendanced_at->diffInHours($this->leaved_at);

        return $work_hour;
    }

}
