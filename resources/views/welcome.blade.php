@extends('layouts.layout')

@section('content')
<header class="masthead">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-6 text-center text-white">
                <!-- Page heading -->
                <h1 class="mb-5">각종 교육기관에 대한 정보를 검색해주세요!</h1>

                <!-- Form -->
                <form class="form-subscribe d-flex flex-column align-items-center" action="/search/results" method="post">
                    @csrf
                    <div class="form-group w-100">
                        <input class="form-control form-control-lg" name="academy_name" type="text" placeholder="교육 기관 이름 검색" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Icons Grid-->
<section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-house-door m-auto text-primary"></i></div>
                        <h3>어린이집</h3>
                        <p class="lead mb-0">어린이집은 아이들의 두 번째 집입니다!</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-book m-auto text-primary"></i></div>
                        <h3>유치원</h3>
                        <p class="lead mb-0">유치원에서는 놀면서 배웁니다!</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-pencil m-auto text-primary"></i></div>
                        <h3>학원</h3>
                        <p class="lead mb-0">제일 많이 검색된 학원 정보: 영어, 수학, 과학</p>
                    </div>
                </div>
                <!-- 식당 추가 -->
                <div class="col-lg-3">
                    <div id="restaurant-section" class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="bi-utensils m-auto text-primary"></i>
                        </div>
                        <h3>식당</h3>
                        <p class="lead mb-0">가장 빠르게 찾을 수 있는 근처 식당 정보!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- 다른 섹션은 생략 -->
<section>
    <div style="text-align: center; margin-bottom: 20px;">
        <h2>내 주변 교육기관 알아보기</h2>
    </div>
    <div id="map" style="width:100%;height:400px;"></div>
</section>

<div id="result"></div>
<script type="text/javascript">
    (function() {
        var map = new naver.maps.Map("map", {
            center: new naver.maps.LatLng(37.566826, 126.9786567),
            zoom: 10
        });

        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude,
                    lon = position.coords.longitude;

                var location = new naver.maps.LatLng(lat, lon);
                map.setCenter(location);
                map.setZoom(15);

                new naver.maps.Marker({
                    map: map,
                    position: location
                });

                // 서버에서 교육기관의 좌표를 가져오는 부분
                fetch('/get_coordinates')
                .then(response => response.json())
                .then(data => {
                    data.forEach(coord => {
                        var education_location = new naver.maps.LatLng(coord.coordinateX, coord.coordinateY);
                        
                        // 거리 계산 (간단한 예시)
                        var distance = naver.maps.geometry.spherical.computeDistanceBetween(location, education_location);
                        
                        if(distance <= 1000) {
                            new naver.maps.Marker({
                                map: map,
                                position: education_location
                            });
                        }
                    });
                });
            });
        } else {
            alert("이 브라우저에서는 Geolocation이 지원되지 않습니다.");
        }
    })();
</script>
        @endsection