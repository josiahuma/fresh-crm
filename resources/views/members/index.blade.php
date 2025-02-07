@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Members</h1>
        <a href="{{ route('members.create') }}" class="btn btn-success mb-3">Add Member</a>
        <form action="{{ route('members.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="csv_file" required>
    <button type="submit">Upload</button>
</form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile Number</th>
                    <th>Date of Birth</th>
                    <th>Anniversary Date</th>
                    <th>Church Unit</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->first_name }}</td>
                        <td>{{ $member->last_name }}</td>
                        <td>{{ $member->mobile_number }}</td>
                        <td>{{ $member->date_of_birth }}</td>
                        <td>{{ $member->anniversary_date }}</td>
                        <td>{{ $member->church_unit }}</td>
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
@endsection