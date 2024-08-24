@extends('admin.adminPanel')

@section('adminContent')

<div class="recentorders">
    <div class="cardHeader">
        <h2>Transaction History</h2>
    </div>
    <table class="table table-hover" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Product Name</th>
                <th>Email</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($charges as $charge)
            <tr>
                <td>{{ $charge->id }}</td>
                <td>${{ number_format($charge->amount / 100, 2) }}</td>
                <td>{{ strtoupper($charge->currency) }}</td>
                <td>{{ ucfirst($charge->status) }}</td>
                <td>{{ $charge->metadata['product_name'] }}</td>
                <td>{{ $charge->billing_details->name }}</td>
                <td>{{ \Carbon\Carbon::createFromTimestamp($charge->created)->toDateTimeString() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection