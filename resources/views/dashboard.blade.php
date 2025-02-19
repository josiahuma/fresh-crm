@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="my-4">Dashboard</h1>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-2 mb-4">
            <a href="{{ route('members.index') }}">
                <div class="tile tile-members">
                    <i class="fas fa-users"></i> Members: {{ \App\Models\Member::count() }}
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-4">
            <a href="{{ route('leaders.index') }}">
                <div class="tile tile-leaders">
                    <i class="fas fa-user-tie"></i> Leaders: {{ \App\Models\Leader::count() }}
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-4">
            <a href="{{ route('attendances.index') }}">
                <div class="tile tile-attendance">
                    <i class="fas fa-calendar-check"></i> Attendance: {{ \App\Models\Attendance::sum('men') + \App\Models\Attendance::sum('women') + \App\Models\Attendance::sum('children') }}
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-4">
            <a href="{{ route('finances.index') }}">
                <div class="tile tile-income">
                    <i class="fas fa-pound-sign"></i> Income: £{{ \App\Models\Finance::where('type', 'income')->sum('amount') }}
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-4">
            <a href="{{ route('finances.index') }}">
                <div class="tile tile-expenses">
                    <i class="fas fa-pound-sign"></i> Expenses: £{{ \App\Models\Finance::where('type', 'expense')->sum('amount') }}
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-4">
            <h2 class="my-4">Upcoming Birthdays and Anniversaries</h2>
        </div>
        <div class="col-sm-12 col-md-6 mb-4">
            <h2 class="my-4">Select Today / This Month</h2>
            <select id="post" class="form-control form-control-sm">
                <option value="1">Today</option>
                <option value="2">This Month</option>
            </select>
        </div>
    </div>
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
                    <tbody id="b_module-1" class="b_module">
                    @foreach(\App\Models\Member::whereDay('date_of_birth', \Carbon\Carbon::today()->day)
                    ->whereMonth('date_of_birth', \Carbon\Carbon::today()->month)->get() as $member)
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
                    <tbody id="b_module-2" class="b_module">
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
                            <th class="sortable px-4 py-2 cursor-pointer" data-label="Mobile Number" onclick="sortTableA(3)">Mobile Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="a_module-1" class="a_module">
                    @foreach(\App\Models\Member::whereDay('anniversary_date', \Carbon\Carbon::today()->day)
                    ->whereMonth('date_of_birth', \Carbon\Carbon::today()->month)->get() as $member)
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
                    <tbody id="a_module-2" class="a_module">
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
    <div class="row">
        <div class="col-12">
        <h3>Financial Report</h3>
            <canvas id="incomeExpensesChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('incomeExpensesChart').getContext('2d');
    const incomeExpensesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Income', 'Expenses'],
            datasets: [{
                label: 'Amount (£)',
                data: [
                    {{ \App\Models\Finance::where('type', 'income')->whereMonth('created_at', \Carbon\Carbon::now()->month)->sum('amount') }},
                    {{ \App\Models\Finance::where('type', 'expense')->whereMonth('created_at', \Carbon\Carbon::now()->month)->sum('amount') }}
                ],
                backgroundColor: ['#28a745', '#dc3545'],
                borderColor: ['#28a745', '#dc3545'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
    // hide all initially
    let b_modules = $('.b_module').hide();
    let a_modules = $('.a_module').hide();
    $('#b_module-1').show();
    $('#a_module-1').show();
    $('#post').on('change', function() {
        // get value of selected option, which is id of module
        let b_value = $(this).val();
        let a_value = $(this).val();
        // hide all modules
        b_modules.hide();
        a_modules.hide();
        // show module with matching id that was selected
        $('#b_module-' + b_value).show();
        $('#a_module-' + a_value).show();
    });
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