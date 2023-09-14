@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    <h1 class="display-4">{{ $center->name }}</h1>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{ $center->name }}</td>
            </tr>
            <tr>
                <th scope="row">Type</th>
                <td>{{ $center->type }}</td>
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td>{{ $center->address }}</td>
            </tr>
            <tr>
                <th scope="row">Capacity</th>
                <td>{{ $center->capacity }}</td>
            </tr>
            <tr>
                <th scope="row">Current Number</th>
                <td>{{ $center->current_number }}</td>
            </tr>
        </tbody>
    </table>
    <a href="/childcare" class="btn btn-primary mt-3">Back to List</a>
</div>


@endsection
