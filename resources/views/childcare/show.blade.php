@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    <h1 class="display-4">{{ $center->name }}</h1>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{ $center->name }}</td>
            </tr>
            <tr>
                <th scope="row">Type</th>
                <td>{{ $center->type }}</td>
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td>{{ $center->address }}</td>
            </tr>
            <tr>
                <th scope="row">Capacity</th>
                <td>{{ $center->capacity }}</td>
            </tr>
            <tr>
                <th scope="row">Current Number</th>
                <td>{{ $center->current_number }}</td>
            </tr>
        </tbody>
    </table>
    <a href="/childcare" class="btn btn-primary mt-3">Back to List</a>
</div>

<div id="map" style="width:100%;height:400px;"></div>

<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId={{ env('NAVER_CLIENT_ID') }}&callback=initMap"></script>
<script type="text/javascript" src="https://oapi.map.naver.com/openapi/v3/maps.js?ncpClientId={{ env('NAVER_CLIENT_ID') }}&submodules=geocoder"></script>

<script>
    function initMap() {
        var mapOptions = {
            center: new naver.maps.LatLng(37.5665, 126.9780),
            zoom: 18
        };

        var map = new naver.maps.Map('map', mapOptions);

        // 서버에서 받은 주소. 예를 들어, 라라벨에서 Blade로 넘겨준 데이터를 사용할 수 있습니다.
        var address = "{{ $center->address }}";
        naver.maps.Service.geocode({
            query: address
        }, function(status, response) {
            if (status !== naver.maps.Service.Status.OK) {
                return alert('Something wrong!');
            }
            console.log(response);

            var result = response.v2,
                items = result.addresses;

            var point = new naver.maps.Point(items[0].x, items[0].y);
            map.setCenter(point);
            new naver.maps.Marker({
                position: point,
                map: map
            });
        });
    }
</script>

@endsection
