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
        $setting_data = Auth::user()
            ->WorkTimes()
            ->get();
        if ($setting_data->isEmpty()) {
            return redirect()->route('setting.create');
        }
        return view('attendance', [
            'setting_data' => $setting_data
        ]);
    }

    /**
     * Excel export
     */
    public function export(Request $request)
    {
        $data = $this->recordFilter($request);
        $data_content = $data->content();
        $view = view('export', [
            'attendance_records' => json_decode($data_content)
        ]);
        return \Excel::download(new Export($view), 'attendance.csv');
    }

    /**
     * Ajax record filter endpoint
     */
    public function recordFilter(Request $request) {
        $attendance_records = Auth::user()
            ->AttendanceRecords()
            ->where('date', 'like', $request->month . '%')
            ->orderBy('date', 'asc')
            ->get();
        $setting_data = Auth::user()
            ->WorkTimes()
            ->get();
        $this->calcAttendanceData($attendance_records, $setting_data);
        return response()->json($attendance_records);
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
            $attendance->rest_time = $rest_time;
        }
    }

}
