<?php

namespace App\Http\Controllers;

use App\Models\WorkTime;
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
        return view('setting');
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
}
