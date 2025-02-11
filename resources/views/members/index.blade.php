@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="my-4">Members</h1>
    <a href="{{ route('members.create') }}" class="btn btn-success mb-3">Add Member</a>
    <form action="{{ route('members.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" required>
        <button type="submit">Upload</button>
    </form>
    <div class="table-responsive">
        <table id="dataTable" data-sort-order="asc" class="table table-striped">
            <thead>
                <tr>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="First Name" onclick="sortTable(0)">First Name</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Last Name" onclick="sortTable(1)">Last Name</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Mobile Number" onclick="sortTable(2)">Mobile Number</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Email" onclick="sortTable(3)">Email</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Date of Birth" onclick="sortTable(4)">Date of Birth</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Anniversary Date" onclick="sortTable(5)">Anniversary Date</th>
                    <th class="sortable px-4 py-2 cursor-pointer" data-label="Church Unit" onclick="sortTable(6)">Church Unit</th>
                    <th>Custom Fields</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr class="clickable-row" data-href="{{ route('members.profile', $member->id) }}">
                    <td>{{ $member->first_name }}</td>
                    <td>{{ $member->last_name }}</td>
                    <td>{{ $member->mobile_number }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->date_of_birth }}</td>
                    <td>{{ $member->anniversary_date }}</td>
                    <td>{{ $member->church_unit }}</td>
                    <td>{{ $member->custom_fields }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                        </form>
                        <form action="{{ route('members.sendSms') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="member_ids[]" value="{{ $member->id }}">
                            <select name="template_id" class="form-control form-control-sm" required>
                                @foreach(\App\Models\SmsTemplate::all() as $template)
                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Send SMS</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });

        // Prevent the click event on the row from triggering when clicking on buttons or links
        $(".clickable-row a, .clickable-row button, .clickable-row select").click(function(e) {
            e.stopPropagation();
        });
    });

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