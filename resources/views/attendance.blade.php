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
                                    出勤時間：{{ $setting_data[0]->start_time }}　退勤時間：{{ $setting_data[0]->end_time }}　休憩時間：{{ $setting_data[0]->rest_time }}
                                </p>
                                <div class="table-title__filter">
                                    <svg id="js-previous" class="w-6 h-6" fill="none" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    <span id="js-month"></span>
                                    <svg id="js-next" class="w-6 h-6" fill="none" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                                <div class="table-title__csv">
                                    <a id="js-csv" href="">CSV</a>
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
                            <tbody id="js-target"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection