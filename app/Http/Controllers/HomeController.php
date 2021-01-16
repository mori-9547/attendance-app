<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// use App\Models\AttendanceRecord;
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
        $attendance_data = Auth::user()
            ->AttendanceRecords()
            ->where('date', $today)
            ->first();
        $attendance_status = '';
        if (!empty($attendance_data['status'])) {
            $attendance_status = $attendance_data['status'];
        }
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
        $attendance_data = [
            'user_id'        => Auth::id(),
            'date'           => $request->stamp_date,
            'attendanced_at' => $request->stamp_time
        ];
        Auth::user()->AttendanceRecords()->create($attendance_data);
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
        $update_data = [
            'leaved_at' => $request->stamp_time,
            'status'    => 2
        ];
        Auth::user()
            ->AttendanceRecords()
            ->where('date', $request->stamp_date)
            ->update($update_data);
        return redirect()->route('home');
    }
}
