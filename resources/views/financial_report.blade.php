@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2>Financial Report</h2>
    <form method="GET" action="{{ route('financial.report') }}">
        <div class="form-group">
            <label for="year">Select Year:</label>
            <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                @foreach($years as $availableYear)
                <option value="{{ $availableYear }}" {{ $availableYear == $year ? 'selected' : '' }}>{{ $availableYear }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <canvas id="financialChart" height="100px"></canvas>
    <button id="exportButton" class="btn btn-primary mt-3">Export to JPG</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('financialChart').getContext('2d');
    const months = @json($months);

    const labels = months.map(data => data.month);
    const income = months.map(data => data.income);
    const expense = months.map(data => data.expense);

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Income',
                    data: income,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Expense',
                    data: expense,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
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
                        text: 'Amount (£)'
                    },
                    beginAtZero: true
                }
            }
        }
    });

    document.getElementById('exportButton').addEventListener('click', function () {
        html2canvas(document.getElementById('financialChart')).then(canvas => {
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/jpeg');
            link.download = 'finance_chart.jpg';
            link.click();
        });
    });
});
</script>
@endsection