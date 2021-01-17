@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-3">
        @include('layouts.sidebar')
        <div class="col" id="main">
            <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>出勤時間</th>
                        <th>退勤時間</th>
                        <th>休憩時間</th>
                        <th>残業時間</th>
                        <th>勤務時間</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendance_records as $record)
                    <tr>
                        <th scope="row">{{ $record->date->format('Y/m/d') }}</th>
                        <td>{{ $record->attendanced_at->format('H:i') }}</td>
                        <td>{{ $record->leaved_at->format('H:i') }}</td>
                        <td>{{ $setting_data[0]->rest_time->format('H:i') }}</td>
                        <td>{{ $record->work_hour - $setting_data[0]->work_hour }}</td>
                        <td>{{ $record->work_hour }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection