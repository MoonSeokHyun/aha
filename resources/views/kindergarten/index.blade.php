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
                <tr>
                    <td>
                        <a href="/kindergartens/{{ $kindergarten->id }}">
                            {{ $kindergarten->KindergartenName }}
                        </a>
                    </td>
                    <td>
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
