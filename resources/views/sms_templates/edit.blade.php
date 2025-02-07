@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit SMS Template</h1>
        <form action="{{ route('sms_templates.update', $template->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Template Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $template->name }}" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" required>{{ $template->message }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
