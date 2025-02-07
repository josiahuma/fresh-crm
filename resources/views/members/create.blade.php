@extends('layouts.app')

@section('content')
    <h1>Add Member</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required>
        
        <label for="mobile_number">Mobile Number:</label>
        <input type="text" name="mobile_number" id="mobile_number" required>
        
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" required>
        
        <label for="anniversary_date">Anniversary Date:</label>
        <input type="date" name="anniversary_date" id="anniversary_date">
        
        <label for="church_unit">Church Unit:</label>
        <input type="text" name="church_unit" id="church_unit">
        
        <label for="custom_fields">Custom Fields:</label>
        <textarea name="custom_fields" id="custom_fields"></textarea>
        
        <button type="submit">Save</button>
    </form>
@endsection