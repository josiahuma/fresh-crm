@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Leader Profile') }}</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                        <div class="col-md-6">
                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $leader->firstname }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                        <div class="col-md-6">
                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $leader->lastname }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>
                        <div class="col-md-6">
                            <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $leader->mobile }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $leader->email }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="church_unit" class="col-md-4 col-form-label text-md-end">{{ __('Church Unit') }}</label>
                        <div class="col-md-6">
                            <input id="church_unit" type="text" class="form-control" name="church_unit" value="{{ $leader->church_unit }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="members_count" class="col-md-4 col-form-label text-md-end">{{ __('Members Count') }}</label>
                        <div class="col-md-6">
                            <input id="members_count" type="text" class="form-control" name="members_count" value="{{ $leader->members_count }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('leaders.edit', $leader->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('leaders.destroy', $leader->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection