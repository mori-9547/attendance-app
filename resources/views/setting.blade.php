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
                            就業時間設定
                        </div>
                        <!-- <form class="card-body" action="{{ route('attendanceRecord.store') }}" method="post"> -->
                        <form class="card-body" action="{{ route('setting.store') }}" method="post">
                            @csrf
                            <div class="card-body__time">
                                <p class=label-item>
                                    <label for="start_time">勤務開始時刻</label>
                                    <input class="setting-time" type="time" name="start_time">
                                </p>
                                <p class=label-item>
                                    <label for="end_time">勤務終了時刻</label>
                                    <input class="setting-time" type="time" name="end_time">
                                </p>
                            </dive>
                            <div class="card-body__btns">
                                <button type="submit" class="btn btn-primary">設定</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection