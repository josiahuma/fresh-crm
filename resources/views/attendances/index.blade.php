@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="my-4">Attendance Records</h1>
    <a href="{{ route('attendances.create') }}" class="btn btn-success mb-3">Add Attendance</a>
    <div class="table-responsive">
        <table id="dataTable" data-sort-order="asc" class="table table-striped">
            <thead>
                <tr>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Date" onclick="sortTable(0)">Date</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Men" onclick="sortTable(1)">Men</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Women" onclick="sortTable(2)">Women</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Children" onclick="sortTable(3)">Children</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Event" onclick="sortTable(4)">Total</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Total" onclick="sortTable(5)">Event</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->men }}</td>
                        <td>{{ $attendance->women }}</td>
                        <td>{{ $attendance->children }}</td>
                        <td>{{ $attendance->total }}</td>
                        <td>{{ $attendance->event }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
     function sortTable(columnIndex) {
            let table = document.getElementById("dataTable");
            let rows = Array.from(table.rows).slice(1);
            let direction = table.dataset.sortOrder === "asc" ? -1 : 1;
            
            rows.sort((a, b) => {
                let cellA = a.cells[columnIndex].innerText.trim();
                let cellB = b.cells[columnIndex].innerText.trim();
                
                if (!isNaN(cellA) && !isNaN(cellB)) {
                    return direction * (parseFloat(cellA) - parseFloat(cellB));
                }
                return direction * cellA.localeCompare(cellB);
            });
            
            rows.forEach(row => table.appendChild(row));
            
            table.dataset.sortOrder = direction === 1 ? "asc" : "desc";
            updateArrows(columnIndex, direction === 1 ? "asc" : "desc");
        }

        function updateArrows(columnIndex, order) {
            let headers = document.querySelectorAll(".sortable");
            headers.forEach(header => {
                header.innerHTML = header.dataset.label;
            });
            let arrow = order === "asc" ? " ▲" : " ▼";
            headers[columnIndex].innerHTML += arrow;
        }
</script>
@endsection