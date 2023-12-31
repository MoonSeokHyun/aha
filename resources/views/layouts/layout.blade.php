<!DOCTYPE html>
<html lang="en">
    <head>
        <meta property="og:title" content="교육기관에 대한 정보는 EduRanking!">
        <meta property="og:description" content="각종 교육기관에 대한 정보는 에듀랭킹">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://rangkingedu.shop/">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="각종 교육기관에 대한 정보는 에듀랭킹" />
        <meta name="author" content="" />
        <meta name="naver-site-verification" content="0d05d100241430dd0cfaceba7d9515ef78177332" />
        @yield('meta')
        <title>@yield('title', '교육기관에 대한 정보는 EduRanking!')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId={{ env('NAVER_CLIENT_ID') }}&callback=initMap"></script>
        <script type="text/javascript" src="https://oapi.map.naver.com/openapi/v3/maps.js?ncpClientId={{ env('NAVER_CLIENT_ID') }}&submodules=geocoder"></script>

        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <!--애드센스 블럭-->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6686738239613464" crossorigin="anonymous"></script>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-E4T0V6NNMV"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-E4T0V6NNMV');
        </script>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-md navbar-light bg-light static-top navbar-static-top">
    <div class="container">
        <a class="navbar-brand custom-brand" href="/">EduRanking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2 mx-md-3 custom-nav-item">
                    <a class="nav-link custom-nav-link" href="/childcare">어린이집</a>
                </li>
                <li class="nav-item mx-2 mx-md-3 custom-nav-item">
                    <a class="nav-link custom-nav-link" href="/kindergartens">유치원</a>
                </li>
                <li class="nav-item mx-2 mx-md-3 custom-nav-item">
                    <a class="nav-link custom-nav-link" href="/academy_info">학원</a>
                </li>
                <li class="nav-item mx-2 mx-md-3 custom-nav-item">
                    <a class="nav-link custom-nav-link" href="/public-service-info">식당</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

        <!-- Masthead-->
        
        <main>
        @yield('content')
        </main>
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">About</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contact</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2023. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-facebook fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-instagram fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
