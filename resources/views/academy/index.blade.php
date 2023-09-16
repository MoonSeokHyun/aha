@extends('layouts.layout') <!-- 레이아웃 파일 경로가 올바른지 확인하세요. -->

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Academy Info</h1>
    <table class="table table-bordered table-hover" id="academyTable">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Education Office Name</th>
                <!-- Add other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach($academyInfos as $info)
                <tr data-id="{{ $info->id }}">
                    <td>{{ $info->id }}</td>
                    <td>{{ $info->education_office_name }}</td>
                    <!-- Add other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $academyInfos->links() }}
</div>


<div id="map" style="width:100%;height:400px;"></div>
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
