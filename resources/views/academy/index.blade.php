@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Academy Info</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Education Office Name</th>
                <!-- Add other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach($academyInfos as $info)
                <tr onclick="goToDetailPage({{ $info->id }})">
                    <td>{{ $info->id }}</td>
                    <td>{{ $info->education_office_name }}</td>
                    <!-- Add other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $academyInfos->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
function goToDetailPage(id) {
  window.location.href = `/academy_info/${id}`;
}
</script>

@endsection
