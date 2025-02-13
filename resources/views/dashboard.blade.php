@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="my-4">Dashboard</h1>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
        <a href="{{ route('members.index') }}">
            <div class="tile tile-members">
                <i class="fas fa-users"></i> Members: {{ \App\Models\Member::count() }}
            </div>
        </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
        <a href="{{ route('attendances.index') }}">
            <div class="tile tile-attendance">
                <i class="fas fa-calendar-check"></i> Attendance: {{ \App\Models\Attendance::sum('men') + \App\Models\Attendance::sum('women') + \App\Models\Attendance::sum('children') }}
            </div>
        </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
        <a href="{{ route('finances.index') }}">
            <div class="tile tile-income">
                <i class="fas fa-pound-sign"></i> Income: £{{ \App\Models\Finance::where('type', 'income')->sum('amount') }}
            </div>
        </a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
        <a href="{{ route('finances.index') }}">
            <div class="tile tile-expenses">
                <i class="fas fa-pound-sign"></i> Expenses: £{{ \App\Models\Finance::where('type', 'expense')->sum('amount') }}
            </div>
        </a>
        </div>
    </div>
    <h2 class="my-4">Upcoming Birthdays and Anniversaries</h2>
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-4">
            <h3>Birthdays</h3>
            <div class="table-responsive">
            <table id="dataTableB" data-sort-order="asc" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="First Name" onclick="sortTableB(0)">First Name</th>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Last Name" onclick="sortTableB(1)">Last Name</th>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Date of Birth" onclick="sortTableB(2)">Date of Birth</th>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Mobile Number" onclick="sortTableB(3)">Mobile Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Member::whereMonth('date_of_birth', \Carbon\Carbon::now()->month)->get() as $member)
                        <tr class="clickable-row" data-href="{{ route('members.profile', $member->id) }}">
                            <td>{{ $member->first_name }}</td>
                            <td>{{ $member->last_name }}</td>
                            <td>{{ $member->date_of_birth }}</td>
                            <td>{{ $member->mobile_number }}</td>
                            <td>
                                <form action="{{ route('members.sendSms') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="member_ids[]" value="{{ $member->id }}">
                                    <select name="template_id" class="form-control form-control-sm" required>
                                        @foreach(\App\Models\SmsTemplate::all() as $template)
                                        <option value="{{ $template->id }}">{{ $template->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2" onclick="return confirm('Message Sent')">Send SMS</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-4">
            <h3>Anniversaries</h3>
            <div class="table-responsive">
            <table id="dataTableA" data-sort-order="asc" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="First Name" onclick="sortTableA(0)">First Name</th>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Last Name" onclick="sortTableA(1)">Last Name</th>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Anniversary Date" onclick="sortTableA(2)">Anniversary Date</th>
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Mobile Number2" onclick="sortTableA(3)">Mobile Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Member::whereMonth('anniversary_date', \Carbon\Carbon::now()->month)->get() as $member)
                        <tr class="clickable-row" data-href="{{ route('members.profile', $member->id) }}">
                            <td>{{ $member->first_name }}</td>
                            <td>{{ $member->last_name }}</td>
                            <td>{{ $member->anniversary_date }}</td>
                            <td>{{ $member->mobile_number }}</td>
                            <td>
                                <form action="{{ route('members.sendSms') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="member_ids[]" value="{{ $member->id }}">
                                    <select name="template_id" class="form-control form-control-sm" required>
                                        @foreach(\App\Models\SmsTemplate::all() as $template)
                                        <option value="{{ $template->id }}">{{ $template->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2" onclick="return confirm('Message Sent')">Send SMS</button>
                                </form>
                            </td>
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
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });

        // Prevent the click event on the row from triggering when clicking on buttons or links
        $(".clickable-row a, .clickable-row button, .clickable-row select").click(function(e) {
            e.stopPropagation();
        });
    });

    function sortTableB(columnIndex) {
            let table = document.getElementById("dataTableB");
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

        function sortTableA(columnIndex) {
            let table = document.getElementById("dataTableA");
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
