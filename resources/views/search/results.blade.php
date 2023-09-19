@extends('layouts.layout')

@section('content')



  @if($academy_info->isEmpty() && $childcarecenter->isEmpty() && $kindergarten->isEmpty())
    <div class="alert alert-warning" role="alert">
      검색어가 없습니다.
    </div>
  @else
  <div style="text-align: center; margin-bottom: 20px;">
    <h2>내 주변 교육기관 알아보기</h2>
    </div>
    <div id="map" style="width:70%;height:400px;" class="mx-auto d-block"></div>
    <div class="container my-4">
    <div class="row">
      <div class="col-md-4">
        <h4 class="mb-3">어린이집 정보</h4>
        @foreach($childcarecenter as $center)
          <div class="card mb-3">
            <div class="card-body">
              <a href="{{ url('childcare/' . $center->id) }}" class="text-info">
                {{ $center->name }}
              </a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="col-md-4">
        <h4 class="mb-3">유치원 정보</h4>
        @foreach($kindergarten as $kinder)
          <div class="card mb-3">
            <div class="card-body">
              <a href="{{ url('kindergartens/' . $kinder->id) }}" class="text-primary">
                {{ $kinder->KindergartenName }}
              </a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="col-md-4">
        <h4 class="mb-3">아카데미 정보</h4>
        @foreach($academy_info as $info)
          <div class="card mb-3">
            <div class="card-body">
              <a href="{{ url('/academy_info/' . $info->id) }}" class="text-success">
                {{ $info->academy_name }}
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif
</div>
        <script>
            var mapOptions = {
                center: new naver.maps.LatLng(37.5665, 126.9780), // 초기 위치: 서울시청
                zoom: 15
            };
    
            var map = new naver.maps.Map('map', mapOptions);
    
            // HTML5의 geolocation으로 사용할 수 있는지 확인합니다.
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude,
                        lon = position.coords.longitude;
    
                    var location = new naver.maps.LatLng(lat, lon);
    
                    map.setCenter(location); // 얻은 좌표를 지도의 중심으로 설정합니다.
                    map.setZoom(15); // 지도의 줌 레벨을 변경합니다.
    
                    // 지도에 마커를 표시합니다.
                    new naver.maps.Marker({
                        map: map,
                        position: location
                    });
                });
            } else {
                alert("이 브라우저에서는 Geolocation이 지원되지 않습니다.")
            }
        </script>
@endsection
