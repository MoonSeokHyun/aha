@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Academy Info</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">학원명</th>
                    <th scope="col" class="text-center">주소</th>
                </tr>
            </thead>
            <tbody>
                @foreach($academyInfos as $info)
                    <tr>
                        <td class="text-center">{{ $info->id }}</td>
                        <td class="text-center">
                            <a href="/academy_info/{{ $info->id }}">
                                {{ $info->academy_name }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/academy_info/{{ $info->id }}">
                                {{ $info->road_name_address }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $academyInfos->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
