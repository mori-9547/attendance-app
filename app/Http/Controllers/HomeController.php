<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AttendanceRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $attendance_status = Auth::user()
            ->AttendanceRecords()
            ->select('status')
            ->where('date', $today)
            ->get()
            ->toArray();

        return view('home', [
            'attendance_status' => $attendance_status
        ]);
    }

    /**
     * Store attendance record
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $attendance_record = new AttendanceRecord();
        $attendance_record->user_id = $user_id;
        $attendance_record->attendanced_at = $request->stamp_time;
        $attendance_record->date = $request->stamp_date;
        Auth::user()->AttendanceRecords()->save($attendance_record);
        return redirect()->route('home');
    }

    /**
     * Update attendance record
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $attendance_record = Auth::user()
            ->AttendanceRecords()
            ->where('date', $request->stamp_date)
            ->update(['leaved_at' => $request->stamp_time]);
        return redirect()->route('home');
    }
}
