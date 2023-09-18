@extends('layouts.layout')
@section('meta')
    <meta name="description" content="{{ $kindergarten->KindergartenName }}의 정보와 위치 등">
    <meta property="og:title" content="{{ $kindergarten->KindergartenName }}" />
    <meta property="og:description" content="{{ $kindergarten->Address }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
@endsection


@php
    $address_parts = explode(" ", $kindergarten->Address);
    $simplified_address = $address_parts[0] . " " . $address_parts[1] . " " . $address_parts[2];
@endphp

@section('title', $simplified_address . ' ' . $kindergarten->KindergartenName , '' , $kindergarten->EstablishmentType)

@section('content')

<div class="container mt-5">
    <h1 class="text-center">{{ $kindergarten->KindergartenName }}</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <tr><th>ID</th><td>{{ $kindergarten->id }}</td></tr>
                    <tr><th>교육청 이름</th><td>{{ $kindergarten->EducationOfficeName }}</td></tr>
                    <tr><th>교육지원청 이름</th><td>{{ $kindergarten->EducationSupportOfficeName }}</td></tr>
                    <tr><th>유치원 이름</th><td>{{ $kindergarten->KindergartenName }}</td></tr>
                    <tr><th>설립 유형</th><td>{{ $kindergarten->EstablishmentType }}</td></tr>
                    <tr><th>대표자 이름</th><td>{{ $kindergarten->RepresentativeName }}</td></tr>
                    <tr><th>원장 이름</th><td>{{ $kindergarten->PrincipalName }}</td></tr>
                    <tr><th>설립 일자</th><td>{{ $kindergarten->EstablishmentDate }}</td></tr>
                    <tr><th>개원 일자</th><td>{{ $kindergarten->OpeningDate }}</td></tr>
                    <tr><th>주소</th><td>{{ $kindergarten->Address }}</td></tr>
                    <tr><th>전화번호</th><td>{{ $kindergarten->PhoneNumber }}</td></tr>
                    <tr><th>웹사이트</th><td>{{ $kindergarten->Website }}</td></tr>
                    <tr><th>운영 시간</th><td>{{ $kindergarten->OperatingHours }}</td></tr>
                    <tr><th>3세반 수</th><td>{{ $kindergarten->ClassCount3YearsOld }}</td></tr>
                    <tr><th>4세반 수</th><td>{{ $kindergarten->ClassCount4YearsOld }}</td></tr>
                    <tr><th>5세반 수</th><td>{{ $kindergarten->ClassCount5YearsOld }}</td></tr>
                    <tr><th>혼합반 수</th><td>{{ $kindergarten->MixedClassCount }}</td></tr>
                    <tr><th>특수반 수</th><td>{{ $kindergarten->SpecialClassCount }}</td></tr>
                    <tr><th>총 정원</th><td>{{ $kindergarten->TotalApprovedCapacity }}</td></tr>
                    <tr><th>3세 정원</th><td>{{ $kindergarten->Capacity3YearsOld }}</td></tr>
                    <tr><th>4세 정원</th><td>{{ $kindergarten->Capacity4YearsOld }}</td></tr>
                    <tr><th>5세 정원</th><td>{{ $kindergarten->Capacity5YearsOld }}</td></tr>
                    <tr><th>혼합 모집 정원</th><td>{{ $kindergarten->MixedRecruitmentCapacity }}</td></tr>
                    <tr><th>특수반 모집 정원</th><td>{{ $kindergarten->SpecialClassRecruitmentCapacity }}</td></tr>
                    <tr><th>3세 아동 수</th><td>{{ $kindergarten->NumberOfChildren3YearsOld }}</td></tr>
                    <tr><th>4세 아동 수</th><td>{{ $kindergarten->NumberOfChildren4YearsOld }}</td></tr>
                    <tr><th>5세 아동 수</th><td>{{ $kindergarten->NumberOfChildren5YearsOld }}</td></tr>
                    <tr><th>혼합 아동 수</th><td>{{ $kindergarten->NumberOfMixedChildren }}</td></tr>
                    <tr><th>특수 아동 수</th><td>{{ $kindergarten->NumberOfSpecialChildren }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
이렇게 변경하면 각 컬럼이 한국어로 표시될 것입니다.







<div id="map" style="width:100%;height:400px;"></div>



<script>
    function initMap() {
        var mapOptions = {
            center: new naver.maps.LatLng(37.5665, 126.9780),
            zoom: 18
        };

        var map = new naver.maps.Map('map', mapOptions);

        // 서버에서 받은 주소. 예를 들어, 라라벨에서 Blade로 넘겨준 데이터를 사용할 수 있습니다.
        var address = "{{ $kindergarten->Address }}";
        naver.maps.Service.geocode({
            query: address
        }, function(status, response) {
            if (status !== naver.maps.Service.Status.OK) {
                return alert('Something wrong!');
            }

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
