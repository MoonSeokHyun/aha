@extends('layouts.layout')

@section('content')

<h1>Academy Info</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Education Office Name</th>
                <!-- Add other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach($academyInfos as $info)
                <tr>
                    <td>{{ $info->id }}</td>
                    <td>{{ $info->education_office_name }}</td>
                    <!-- Add other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $academyInfos->links() }}


@endsection
