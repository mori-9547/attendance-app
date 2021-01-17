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
    public function index()
    {
        $attendance_records = Auth::user()
            ->AttendanceRecords()
            ->get();
        $setting_data = Auth::user()
            ->WorkTimes()
            ->get();
        return view('attendance', [
            'attendance_records' => $attendance_records,
            'setting_data' => $setting_data
        ]);
    }
}
