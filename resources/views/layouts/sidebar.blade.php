@section('sidebar')
<div class="col-3" id="sticky-sidebar">
    <div class="sticky-top">
        <div class="list-group">
            <a href="/"
                class="list-group-item {{ request()->path() == '/' ? 'active' : 'list-group-item-action' }}"
            >Home</a>
            <a href="{{ route('attendanceRecord.index') }}"
                class="list-group-item {{ request()->is('*attendance*') ? 'active' : 'list-group-item-action' }}"
            >Attendance Records</a>
        </div>
    </div>
</div>
@show