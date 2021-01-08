@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-3">
        <div class="col-3" id="sticky-sidebar">
            <div class="sticky-top">
                <div class="list-group">
                    <a href="#!" class="list-group-item active">Attendance</a>
                    <a href="#!" class="list-group-item list-group-item-action">Log</a>
                </div>
            </div>
        </div>
        <div class="col" id="main">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                        <div class="card-body">
                            <form class="card-body__time">
                                <span id="js-date"></span>
                                <p id="js-time"></p>
                                <input type="hidden" name="stamp_date">
                                <input type="hidden" name="stamp_time">
                            </form>
                            <div class="card-body__btns">
                                <button type="button" class="btn btn-primary">出勤</button>
                                <button type="button" class="btn btn-secondary">退勤</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection