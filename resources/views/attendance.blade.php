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
                        <th>Date</th>
                        <th>Commuting</th>
                        <th>Leave work</th>
                        <th>Rest</th>
                        <th>Overtime</th>
                        <th>Working hours</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendance_records as $record)
                    <tr>
                        <th scope="row">{{ $record->date->format('Y/m/d') }}</th>
                        <td>{{ $record->attendanced_at }}</td>
                        <td>{{ $record->leaved_at }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection