@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>View Member</h1>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <label for="first_name">{{ $member->first_name }}</label>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <label for="last_name">{{ $member->last_name }}</label>
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile Number:</label>
            <label for="mobile_number">{{ $member->mobile_number }}</label>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <label for="email">{{ $member->email }}</label>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <label for="date_of_birth">{{ $member->date_of_birth }}</label>
        </div>
        <div class="form-group">
            <label for="anniversary_date">Anniversary Date:</label>
            <label for="anniversary_date">{{ $member->anniversary_date }}</label>
        </div>
        <div class="form-group">
            <label for="church_unit">Church Unit:</label>
            <label for="church_unit">{{ $member->church_unit }}</label>
        </div>
        <div class="form-group">
            <label for="church_leader">Church Leader:</label>
            <label for="church_leader">{{ $member->church_leader }}</label>
        </div>
        <div class="form-group">
            <label for="custom_fields">Custom Fields:</label>
            <label for="custom_fields">{{ $member->custom_fields }}</label>
        </div>
        <div class="form-group">
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
            </form>
            <br />
            <br />
            <label class="notice" for="send_sms">Send SMS (Choose SMS template below):</label>
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
        </div>
</div>
@endsection