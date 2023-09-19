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
        @endsection