@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2>Attendance Report</h2>
    <form method="GET" action="{{ route('attendance.report') }}">
        <div class="form-group">
            <label for="year">Select Year:</label>
            <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                @foreach($years as $availableYear)
                <option value="{{ $availableYear }}" {{ $availableYear == $year ? 'selected' : '' }}>{{ $availableYear }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <canvas id="attendanceChart" height="100px"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('attendanceChart').getContext('2d');
    const attendanceData = @json($attendanceData);
    const labels = attendanceData.map(data => data.month);
    const totals = attendanceData.map(data => data.total);
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Attendance',
                data: totals,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Total Attendance'
                    },
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection