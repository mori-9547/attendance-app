<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceRecordController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $attendance_records = Auth::user()
        ->AttendanceRecords()
        ->orderBy('date', 'asc')
        ->get();
        $setting_data = Auth::user()
        ->WorkTimes()
        ->get();
        if (isset($setting_data[0])) {
            $rest_minutes = Carbon::parse($setting_data[0]->rest_time)->minute / 60;
            $setting_data[0]->rest_time = Carbon::parse($setting_data[0]->rest_time)->hour + $rest_minutes;
            $setting_data[0]->start_time = Carbon::parse($setting_data[0]->start_time)->format('H:i');
            $setting_data[0]->end_time = Carbon::parse($setting_data[0]->end_time)->format('H:i');
        }
        return view('attendance', [
            'attendance_records' => $attendance_records,
            'setting_data' => $setting_data
        ]);
    }
}
