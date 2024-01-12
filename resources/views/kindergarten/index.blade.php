@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <input type="text" id="region" placeholder="Search by region">
    <button onclick="searchByRegion()">Search</button>

    <h1 class="text-center mb-4">학원 정보</h1>
    <div id="post-data">
        @if(isset($kindergartens))
            @foreach($kindergartens as $info)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $info->KindergartenName }}</h5>
                        <p class="card-text">{{ $info->address }}</p>
                        <a href="/kindergartens/{{ $info->id }}" class="btn btn-primary">자세히 보기</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- Laravel 기본 페이징 링크 표시 -->
    <div class="pagination justify-content-center">
        {{ $kindergartens->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var page = 1;

    function searchByRegion() {
        const region = $('#region').val();
        window.location.href = `?region=${region}`;
    }

    $(document).ready(function() {
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            $.ajax({
                url: `?page=${page}&region=${$('#region').val()}`,
                type: 'get',
                beforeSend: function() {
                    $('.ajax-load').show();
                }
            }).done(function(data) {
                if(data.data.length === 0) {
                    $('.ajax-load').html("데이터가 더 이상 없습니다");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(renderData(data.data));
            }).fail(function() {
                alert('서버 응답이 없습니다.');
            });
        }

        function renderData(data) {
            var html = '';
            for(var item of data) {
                html += '<div class="card mb-3"><div class="card-body">';
                html += `<h5 class="card-title">${item.KindergartenName}</h5>`;
                html += `<p class="card-text">${item.address}</p>`;
                html += `<a href="/academy_info/${item.id}" class="btn btn-primary">자세히 보기</a>`;
                html += '</div></div>';
            }
            return html;
        }
    });
</script>
@endsection
