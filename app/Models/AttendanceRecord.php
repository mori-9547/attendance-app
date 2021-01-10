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

    // /**
    //  * 状態定義
    //  */
    // const STATUS = [
    //     1 => [ 'label' => '勤務なう', 'class' => '' ],
    //     2 => [ 'label' => 'お疲れさん', 'class' => '' ],
    // ];

    // /**
    //  * 状態のラベル
    //  * @return string
    //  */
    // public function getStatusAttribute()
    // {
    //     // 状態値
    //     $status = $this->attributes['status'];

    //     // 定義されていなければ空文字を返す
    //     if (!isset(self::STATUS[$status])) {
    //         return '';
    //     }

    //     return $status;
    // }

}
