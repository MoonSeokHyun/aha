@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">전국 식당 정보</h1>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">식당 이름</th>
                    <th class="text-center">주소</th>
                    <th class="text-center">업태</th>
                </tr>
            </thead>
            <tbody>
                @foreach($publicServiceInfos as $info)
                    <tr>
                        <td class="text-center">
                            <a href="{{ url('/public-service-info/' . $info->id) }}">
                                {{ $info->id }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/public-service-info/' . $info->id) }}">
                                {{ $info->businessName }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/public-service-info/' . $info->id) }}">
                                {{ $info->roadAddress }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/public-service-info/' . $info->id) }}">
                                {{ $info->sanitationBusinessType }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $publicServiceInfos->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
