@extends('layouts.layout')
@section('title', $center->name )
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
<!--네이버 지도 api-->
<div style="display: flex; justify-content: center;">
    <div id="map" style="width:80%; height:400px;"></div>
</div>


<!-- Bootstrap Container -->
<div id="post-data" class="container mt-5">
    <div class="row">
        <!-- 여기에 검색 결과를 출력 -->
    </div>
</div>

<script>
    const centerName = "{{ $center->name }}";  // Blade 문법을 활용하여 PHP 변수의 값을 가져옵니다.

    function renderData() {
        const reviewQuery = centerName + " 후기";

        $.ajax({
            url: "/api/search",
            type: 'get',
            data: { query: reviewQuery, display: 12 },
            success: function(searchData) {
                const searchItems = JSON.parse(searchData).items;
                
                // Bootstrap Row를 초기화
                let row = $('#post-data .row');
                row.empty();

                for (const searchItem of searchItems) {
                    const searchTitle = searchItem.title;
                    const searchLink = searchItem.link;

                    // Bootstrap Card 형태로 HTML 작성
                    const html = `<div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="${searchLink}" target="_blank">${searchTitle}</a></h5>
                                        </div>
                                    </div>
                                  </div>`;
                    
                    row.append(html);
                }
            },
            error: function() {
                alert("검색 API 호출 실패");
            }
        });
    }

    renderData();
</script>



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
