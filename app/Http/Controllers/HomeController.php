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
        $attendance_data= Auth::user()
                            ->AttendanceRecords()
                            ->select('attendanced_at')
                            ->where('work_date', $today)
                            ->get()
                            ->toArray();
        if (!empty($attendance_data)) {
            
        }
        return view('home');
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
        $attendance_record->work_date = $request->stamp_date;
        $attendance_record->attendanced_at = $request->stamp_time;
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
        $user_id = Auth::id();
    }
}
