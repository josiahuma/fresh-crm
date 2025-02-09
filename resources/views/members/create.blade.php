@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Member</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" name="mobile_number" id="mobile_number" class="form-control" required>  
        </div>
        
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="anniversary_date">Anniversary Date:</label>
            <input type="date" name="anniversary_date" id="anniversary_date" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="church_unit">Church Unit:</label>
            <input type="text" name="church_unit" id="church_unit" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="custom_fields">Custom Fields:</label>
            <textarea name="custom_fields" id="custom_fields"></textarea>
        </div>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Save</button>
        
    </form>
</div>
@endsection