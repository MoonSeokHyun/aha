@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Kindergartens</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th scope="col" class="text-center">유치원</th>
                <th scope="col" class="text-center">주소</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kindergartens as $kindergarten)
                <tr>
                    <td class="text-center">
                        <a href="/kindergartens/{{ $kindergarten->id }}">
                            {{ $kindergarten->id }}
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="/kindergartens/{{ $kindergarten->id }}">
                            {{ $kindergarten->KindergartenName }}
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="/kindergartens/{{ $kindergarten->id }}">
                            {{ $kindergarten->Address }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {{ $kindergartens->links('pagination::bootstrap-4') }}
</div>

@endsection
