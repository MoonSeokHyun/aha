@extends('layouts.layout')

@section('content')
<header class="masthead">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h1 class="mb-5">각종 교육기관에 대한 정보를 검색해주세요!</h1>
                    <form class="form-subscribe" action="/search/results" method="post">
                        @csrf
                        <input class="form-control form-control-lg" name="academy_name" type="text" placeholder="교육 기관 이름 검색" />
                        <button class="d-none" type="submit">Search</button>
                        <div class="col-auto"> <button class="btn btn-primary btn-lg" type="submit">Search</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-house-door m-auto text-primary"></i></div>
                            <h3>어린이집</h3>
                            <p class="lead mb-0">어린이집은 아이들의 두 번째 집입니다!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-book m-auto text-primary"></i></div>
                            <h3>유치원</h3>
                            <p class="lead mb-0">유치원에서는 놀면서 배웁니다!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-pencil m-auto text-primary"></i></div>
                            <h3>학원</h3>
                            <p class="lead mb-0">제일 많이 검색된 학원 정보: 영어, 수학, 과학</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div style="text-align: center; margin-bottom: 20px;">
                <h2>내 주변 교육기관 알아보기</h2>
            </div>
            <div id="map" style="width:100%;height:400px;"></div>
        </section>
        

        <div id="result"></div>

        <script type="text/javascript">
  // 페이지 로딩 완료 후 실행
  document.addEventListener("DOMContentLoaded", function() {
    // 네이버 지도 객체 생성
    var map = new naver.maps.Map("map", {
      center: new naver.maps.LatLng(37.566826, 126.9786567),
      zoom: 10
    });

    // Geocoder 객체 생성
    var geocoder = new naver.maps.Service.Geocoder();

    // HTML5의 geolocation으로 사용할 수 있는지 확인합니다
    if ("geolocation" in navigator) {
      // GeoLocation을 이용해서 접속 위치를 얻어옵니다
      navigator.geolocation.getCurrentPosition(function(position) {
        var lat = position.coords.latitude, // 위도
          lon = position.coords.longitude; // 경도

        // 좌표를 주소로 변환
        geocoder.coordToAddress(lon, lat, function(status, response) {
          if (status === naver.maps.Service.Status.ERROR) {
            return console.log("Geocoding Error: ", status);
          }

          var result = response.result,
            item = result.items[0],
            addr = item.address;
          console.log("현재 위치 주소: " + addr);
        });
      });
    } else {
      alert("이 브라우저에서는 Geolocation이 지원되지 않습니다.");
    }
  });
</script>

        <script>
            var mapOptions = {
                center: new naver.maps.LatLng(37.5665, 126.9780), // 초기 위치: 서울시청
                zoom: 11
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