@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="my-4">Finance Records</h1>
    <a href="{{ route('finances.create') }}" class="btn btn-success mb-3">Add Finance Record</a>
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-4">
            <h3>Income</h3>
            <div class="table-responsive">
                <table id="dataTable" data-sort-order="asc" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Date" onclick="sortTable(0)">Date</th>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Amount" onclick="sortTable(1)">Amount</th>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Description" onclick="sortTable(2)">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Finance::where('type', 'income')->get() as $finance)
                            <tr>
                                <td>{{ $finance->date }}</td>
                                <td>{{ $finance->amount }}</td>
                                <td>{{ $finance->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-4">
            <h3>Expenses</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Finance::where('type', 'expense')->get() as $finance)
                            <tr>
                                <td>{{ $finance->date }}</td>
                                <td>{{ $finance->amount }}</td>
                                <td>{{ $finance->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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