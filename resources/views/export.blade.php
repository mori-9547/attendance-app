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