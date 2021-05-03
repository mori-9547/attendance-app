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
                        @if (empty($work_data))
                        <form class="card-body" action="{{ route('setting.store') }}" method="post" onSubmit="return checkSubmit()">
                        @else
                        <form class="card-body" action="{{ route('setting.update') }}" method="post" onSubmit="return checkSubmit()">
                        @method('PATCH')
                        @endif
                            @csrf
                            <div class="card-body__time">
                                <p class=label-item>
                                    <label for="start_time">勤務開始時刻</label>
                                    <input class="setting-time form-control"
                                        type="time" name="start_time"
                                        value="{{ !empty($work_data['start_time']) ? $work_data['start_time']->format('H:i') : '' }}"
                                    >
                                </p>
                                <p class=label-item>
                                    <label for="end_time">勤務終了時刻</label>
                                    <input class="setting-time form-control"
                                        type="time" name="end_time"
                                        value="{{ !empty($work_data['end_time']) ? $work_data['end_time']->format('H:i') : '' }}"
                                    >
                                </p>
                                <p class=label-item>
                                    <label for="rest_time">休憩時間</label>
                                    <input class="setting-time form-control"
                                        type="time" name="rest_time"
                                        value="{{ !empty($work_data['rest_time']) ? $work_data['rest_time']->format('H:i') : '' }}"
                                    >
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

<script>
    function checkSubmit() {
        return confirm("データを送信しますか？");
    }
</script>