@extends('layouts.layout')

@section('title', $academyInfo->''academy_name'')
@section('content')
    <h1>{{ $academyInfo->academy_name }}</h1>
    <table class="table table-bordered">
        <tr>
            <th>교육청</th>
            <td>{{ $academyInfo->education_office_name }}</td>
        </tr>
        <tr>
            <th>행정구역</th>
            <td>{{ $academyInfo->administrative_district_name }}</td>
        </tr>
        <tr>
            <th>개설일</th>
            <td>{{ $academyInfo->establishment_date }}</td>
        </tr>
        <tr>
            <th>전체 정원</th>
            <td>{{ $academyInfo->total_capacity }}</td>
        </tr>
        <tr>
            <th>분야</th>
            <td>{{ $academyInfo->field_name }}</td>
        </tr>
        <tr>
            <th>교습과정</th>
            <td>{{ $academyInfo->tutorial_course_name }}</td>
        </tr>
        <tr>
            <th>인당 수강료</th>
            <td>{{ $academyInfo->tuition_fee_per_person }}</td>
        </tr>
        <tr>
            <th>주소</th>
            <td>{{ $academyInfo->road_name_address }}</td>
        </tr>
        <tr>
            <th>도로명 상세 주소</th>
            <td>{{ $academyInfo->road_name_detail_address }}</td>
        </tr>
        <tr>
            <th>수강료 공개 여부</th>
            <td>{{ $academyInfo->tuition_fee_public }}</td>
        </tr>
        <tr>
            <th>기숙사 학원 여부</th>
            <td>{{ $academyInfo->dormitory_academy }}</td>
        </tr>
        <tr>
            <th>우편번호</th>
            <td>{{ $academyInfo->postal_code }}</td>
        </tr>
        <tr>
            <th>교습 계열명</th>
            <td>{{ $academyInfo->tutorial_series_name }}</td>
        </tr>
        <tr>
            <th>교습 과정 목록명</th>
            <td>{{ $academyInfo->tutorial_course_list_name }}</td>
        </tr>
        <tr>
            <th>일시 수용 능력 인원 합계</th>
            <td>{{ $academyInfo->temporary_capacity }}</td>
        </tr>
        <tr>
            <th>등록 상태명</th>
            <td>{{ $academyInfo->registration_status_name }}</td>
        </tr>
    </table>



<div id="map" style="width:100%;height:400px;"></div>


    <script>
        function initMap() {
            var mapOptions = {
                center: new naver.maps.LatLng(37.5665, 126.9780),
                zoom: 18
            };
    
            var map = new naver.maps.Map('map', mapOptions);
    
            // 서버에서 받은 주소. 예를 들어, 라라벨에서 Blade로 넘겨준 데이터를 사용할 수 있습니다.
            var address = "{{$academyInfo->road_name_address }}";
            console.log(address);
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

