@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">{{ $publicServiceInfo->businessName }}</h1>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">항목</th>
                    <th scope="col">정보</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>식당 이름</td>
                    <td>{{ $publicServiceInfo->businessName }}</td>
                </tr>
                <tr>
                    <td>주소</td>
                    <td>{{ $publicServiceInfo->roadAddress }}</td>
                </tr>
                <tr>
                    <td>업태</td>
                    <td>{{ $publicServiceInfo->sanitationBusinessType }}</td>
                </tr>
                <tr>
                    <td>서비스 이름</td>
                    <td>{{ $publicServiceInfo->serviceName }}</td>
                </tr>
                <tr>
                    <td>업태</td>
                    <td>{{ $publicServiceInfo->sanitationBusinessType }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
