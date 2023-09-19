@extends('layouts.layout')

@section('content')

<div class="container">
  @if($academy_info->isEmpty() && $childcarecenter->isEmpty() && $kindergarten->isEmpty())
    <div class="alert alert-warning" role="alert">
      검색어가 없습니다.
    </div>
  @else
    <!-- 예시: 아카데미 정보 출력 -->
    @foreach($academy_info as $info)
      <div class="alert alert-success" role="alert">
        {{ $info->academy_name }}
      </div>
    @endforeach

    <!-- 예시: 어린이집 정보 출력 -->
    @foreach($childcarecenter as $center)
      <div class="alert alert-info" role="alert">
        {{ $center->name }}
      </div>
    @endforeach

    <!-- 예시: 유치원 정보 출력 -->
    @foreach($kindergarten as $kinder)
      <div class="alert alert-primary" role="alert">
        {{ $kinder->KindergartenName }}
      </div>
    @endforeach
  @endif
</div>

@endsection
