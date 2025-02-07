@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="tile tile-members">
                    Members: {{ \App\Models\Member::count() }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile tile-attendance">
                    Attendance: {{ \App\Models\Attendance::sum('men') + \App\Models\Attendance::sum('women') + \App\Models\Attendance::sum('children') }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile tile-income">
                    Income: ${{ \App\Models\Finance::sum('income') }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile tile-expenses">
                    Expenses: ${{ \App\Models\Finance::sum('expense') }}
                </div>
            </div>
        </div>

        <h2 class="my-4">Upcoming Birthdays and Anniversaries</h2>

        <h3>Birthdays</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Mobile Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Member::whereMonth('date_of_birth', \Carbon\Carbon::now()->month)->get() as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->date_of_birth }}</td>
                        <td>{{ $member->mobile_number }}</td>
                        <td>
                            <form action="{{ route('members.sendSms') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="member_ids[]" value="{{ $member->id }}">
                                <button type="submit" class="btn btn-primary btn-sm">Send SMS</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Anniversaries</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Anniversary Date</th>
                    <th>Mobile Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Member::whereMonth('anniversary_date', \Carbon\Carbon::now()->month)->get() as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->anniversary_date }}</td>
                        <td>{{ $member->mobile_number }}</td>
                        <td>
                            <form action="{{ route('members.sendSms') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="member_ids[]" value="{{ $member->id }}">
                                <button type="submit" class="btn btn-primary btn-sm">Send SMS</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection