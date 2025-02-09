@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="my-4">Attendance Records</h1>
    <a href="{{ route('attendances.create') }}" class="btn btn-success mb-3">Add Attendance</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Men</th>
                    <th>Women</th>
                    <th>Children</th>
                    <th>Event</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->men }}</td>
                        <td>{{ $attendance->women }}</td>
                        <td>{{ $attendance->children }}</td>
                        <td>{{ $attendance->event }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection