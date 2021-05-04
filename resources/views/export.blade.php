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
            <td scope="row">{{ $record->date }}</td>
            <td>{{ $record->attendanced_at }}</td>
            <td>{{ $record->leaved_at }}</td>
            <td>{{ $record->rest_time }}</td>
            <td>{{ $record->overtime }}</td>
            <td>{{ $record->total_worked }}</td>
        </tr>
        @endforeach
    </tbody>
</table>