@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-3">
        <div class="col-3" id="sticky-sidebar">
            <div class="sticky-top">
                <div class="list-group">
                    <a href="#!" class="list-group-item active">Home</a>
                    <a href="#!" class="list-group-item list-group-item-action">Attendance Records</a>
                </div>
            </div>
        </div>
        <div class="col" id="main">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            {{ isset($attendance_status[0]["status"]) ? "出勤なう" : '' }}
                        </div>
                        @if (!isset($attendance_status[0]["status"]))
                        <form class="card-body" action="{{ route('attendanceRecord.store') }}" method="post">
                        @else
                        <form class="card-body" action="{{ route('attendanceRecord.update') }}" method="post">
                        @method('PUT')
                        @endif
                            @csrf
                            <div class="card-body__time">
                                <span id="js-date"></span>
                                <p id="js-time"></p>
                                <input type="hidden" name="stamp_date">
                                <input type="hidden" name="stamp_time">
                            </dive>
                            <div class="card-body__btns">
                            @if (!isset($attendance_status[0]["status"]))
                                <button type="submit" class="btn btn-primary">出勤</button>
                            @else
                                <button type="submit" class="btn btn-secondary">退勤</button>
                            @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection