@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Follow Ups</h1>
    <form action="{{ route('followups.show') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="leader_name">Select Leader:</label>
            <select name="leader_name" id="leader_name" class="form-control" required>
                <option value="">-- Select Leader --</option>
                @foreach($leaders as $leader)
                    <option value="{{ $leader->first_name }}" {{ isset($leaderName) && $leaderName == $leader->first_name ? 'selected' : '' }}>
                        {{ $leader->first_name }} {{ $leader->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Show Members</button>
    </form>

    @if(isset($members))
        <h2>Members of {{ $leaderName }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>custom_fields</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->first_name }}</td>
                        <td>{{ $member->last_name }}</td>
                        <td>{{ $member->mobile_number }}</td>
                        <td>{{ $member->custom_fields }}</td>
                        <td>
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection