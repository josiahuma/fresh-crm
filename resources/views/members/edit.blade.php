@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Member</h1>
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $member->first_name }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $member->last_name }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ $member->mobile_number }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $member->email }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $member->date_of_birth }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="anniversary_date">Anniversary Date:</label>
            <input type="date" name="anniversary_date" id="anniversary_date" class="form-control" value="{{ $member->anniversary_date }}" @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="church_unit">Church Unit:</label>
            <select name="church_unit" id="church_unit" class="form-control" value="{{ $member->church_unit }}"  @if(auth()->user()->user_type != 'admin') disabled @endif>
                @foreach(\App\Models\ChurchUnitCategory::all() as $church_unit_category)
                    <option value="{{ $church_unit_category->name }}">{{ $church_unit_category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="church_leader">Church Leader:</label>
            <select name="church_leader" id="church_leader" class="form-control" value="{{ $member->church_leader }}" @if(auth()->user()->user_type != 'admin') disabled @endif>
                @foreach(\App\Models\Leader::all() as $leader)
                <option value="{{ $leader->first_name }}" {{ $member->church_leader == $leader->first_name ? 'selected' : '' }}>
                        {{ $leader->first_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="custom_fields">Custom Fields:</label>
            <input type="text" name="custom_fields" id="custom_fields" class="form-control" value="{{ $member->custom_fields }}">
        </div>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection