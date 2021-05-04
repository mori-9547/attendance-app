<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\Export;
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
        $this->calcAttendanceData($attendance_records, $setting_data);
        return view('attendance', [
            'attendance_records' => $attendance_records,
            'setting_data' => $setting_data
        ]);
    }

    /**
     * Excel export
     */
    public function export(Request $request)
    {
        $data = $this->index($request);
        $view = view('export', [
            'attendance_records' => $data->attendance_records,
            'setting_data' => $data->setting_data
        ]);
        return \Excel::download(new Export($view), 'attendance.csv');
    }

    /**
     * Calculate attendance data
     */
    public function calcAttendanceData($attendances, $setting) {
        $start_time = new Carbon($setting[0]->start_time);
        $end_time = new Carbon($setting[0]->end_time);
        $rest_time = new Carbon($setting[0]->rest_time);
        if ($rest_time->minute == 0) {
            $rest_time = $rest_time->hour;
        } else {
            $rest_time = $rest_time->hour + ($rest_time->minute) / 60;
        }
        $work_time = $start_time->diffInHours($end_time) - $rest_time;
        foreach ($attendances as $attendance) {
            $attendance_at = new Carbon($attendance->attendanced_at);
            $leaved_at = new Carbon($attendance->leaved_at);
            $staying_time = $attendance_at->diffInHours($leaved_at);

            // add total work time & work overtime
            $attendance->total_worked = $staying_time - $rest_time;
            $attendance->overtime = $attendance->total_worked - $work_time;
        }

    }
}
