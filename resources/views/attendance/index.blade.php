


<div class="container">
    <h2>Employee Attendance</h2>
    <div class="mb-3">
        <form action="{{ route('attendance.toggle') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ isset($attendances[0]) && is_null($attendances[0]->check_out) ? 'Check Out' : 'Check In' }}
            </button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Check-In Time</th>
                <th>Check-Out Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out ?? 'Still Checked In' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

