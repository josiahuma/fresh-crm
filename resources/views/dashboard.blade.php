@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="my-4">Dashboard</h1>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
            <div class="tile tile-members">
                <i class="fas fa-users"></i> Members: {{ \App\Models\Member::count() }}
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
            <div class="tile tile-attendance">
                <i class="fas fa-calendar-check"></i> Attendance: {{ \App\Models\Attendance::sum('men') + \App\Models\Attendance::sum('women') + \App\Models\Attendance::sum('children') }}
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
            <div class="tile tile-income">
                <i class="fas fa-pound-sign"></i> Income: £{{ \App\Models\Finance::where('type', 'income')->sum('amount') }}
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
            <div class="tile tile-expenses">
                <i class="fas fa-pound-sign"></i> Expenses: £{{ \App\Models\Finance::where('type', 'expense')->sum('amount') }}
            </div>
        </div>
    </div>
    <h2 class="my-4">Upcoming Birthdays and Anniversaries</h2>
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-4">
            <h3>Birthdays</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Mobile Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Member::whereMonth('date_of_birth', \Carbon\Carbon::now()->month)->get() as $member)
                        <tr>
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
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Send SMS</button>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Anniversary Date</th>
                            <th>Mobile Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Member::whereMonth('anniversary_date', \Carbon\Carbon::now()->month)->get() as $member)
                        <tr>
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
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Send SMS</button>
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
@endsection
