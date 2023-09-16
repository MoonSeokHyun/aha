@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Academy Info</h1>
    <table class="table table-striped table-bordered table-hover" id="academyTable">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Education Office Name</th>
                <!-- Add other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach($academyInfos as $info)
                <tr data-id="{{ $info->id }}" class="table-row">
                    <td>{{ $info->id }}</td>
                    <td>{{ $info->education_office_name }}</td>
                    <!-- Add other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $academyInfos->links() }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('#academyTable tbody tr');
        rows.forEach(row => {
            row.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                window.location.href = `/academy_info/${id}`;  
            });
        });
    });
</script>

@endsection
