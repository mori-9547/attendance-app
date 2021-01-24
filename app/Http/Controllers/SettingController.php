<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * 勤務予定時間設定画面
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $work_data = Auth::user()
            ->WorkTimes()
            ->first();
        if (!is_null($work_data)) {
            $work_data->start_time = Carbon::parse($work_data->start_time);
            $work_data->end_time = Carbon::parse($work_data->end_time);
            $work_data->rest_time = Carbon::parse($work_data->rest_time);
        }
        return view('setting', [
            'work_data' => $work_data
        ]);
    }

    /**
     * 勤務予定時間登録
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $work_data = $request->all();
        Auth::user()->WorkTimes()->create($work_data);
        return redirect()->route('home');
    }

    /**
     * 勤務予定時間更新
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $update_data = [
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'rest_time' => $request->rest_time
        ];
        Auth::user()->WorkTimes()->update($update_data);
        return redirect()->route('home');
    }
}
