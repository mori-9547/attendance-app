@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-3">
        @include('layouts.sidebar')
        <div class="col" id="main">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-title">
                                <p class="table-title__schedule">
                                    出勤時間：{{ $setting_data[0]->start_time }}　退勤時間：{{ $setting_data[0]->end_time }}　休憩時間：{{ $setting_data[0]->rest_time }}時間
                                </p>
                                <div class="table-title__filter">
                                    2021/09
                                </div>
                                <div class="table-title__csv">
                                    <a href="">CSV</a>
                                </div>
                            </div>
                        </div>
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
                                    <th scope="row">{{ $record->date }}</th>
                                    <td>{{ $record->attendanced_at }}</td>
                                    <td>{{ $record->leaved_at }}</td>
                                    <td>{{ $setting_data[0]->rest_time }}</td>
                                    <td>{{ $record->work_hour - $setting_data[0]->rest_time - ($setting_data[0]->work_hour - $setting_data[0]->rest_time) }}</td>
                                    <td>{{ $record->work_hour - $setting_data[0]->rest_time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection