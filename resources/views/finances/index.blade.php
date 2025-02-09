@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="my-4">Finance Records</h1>
    <a href="{{ route('finances.create') }}" class="btn btn-success mb-3">Add Finance Record</a>
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-4">
            <h3>Income</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Finance::where('type', 'income')->get() as $finance)
                            <tr>
                                <td>{{ $finance->date }}</td>
                                <td>{{ $finance->amount }}</td>
                                <td>{{ $finance->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-4">
            <h3>Expenses</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Finance::where('type', 'expense')->get() as $finance)
                            <tr>
                                <td>{{ $finance->date }}</td>
                                <td>{{ $finance->amount }}</td>
                                <td>{{ $finance->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection