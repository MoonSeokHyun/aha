@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Kindergartens</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Kindergarten Name</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kindergartens as $kindergarten)
                <tr onclick="goToDetailPage({{ $kindergarten->id }})">
                    <td>{{ $kindergarten->KindergartenName }}</td>
                    <td>{{ $kindergarten->Address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
  function goToDetailPage(id) {
    window.location.href = `/kindergartens/${id}`;
  }
</script>

@endsection
