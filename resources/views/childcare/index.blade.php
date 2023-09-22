@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">어린이집</h1>

    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">글번호</th>
                <th scope="col" class="text-center">어린이집</th>
                <th scope="col" class="text-center">주소</th>
            </tr>
        </thead>
        <tbody id="post-data">
            @foreach($centers as $center)
                <tr>
                    <td class="text-center"><a href="/childcare/{{ $center->id }}">{{ $center->id }}</a></td>
                    <td class="text-center"><a href="/childcare/{{ $center->id }}">{{ $center->name }}</a></td>
                    <td class="text-center"><a href="/childcare/{{ $center->id }}">{{ $center->address }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $centers->links('pagination::bootstrap-4') }}
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function renderData(data) {
        let html = '';
        for(let item of data) {
            html += `<tr>
                        <td class="text-center">${item.name}</td>
                        <td class="text-center">${item.address}</td>
                        <td class="text-center"><a href="/childcare/${item.id}" class="btn btn-primary">View Details</a></td>
                    </tr>`;
        }
        return html;
    }
</script>

@endsection
