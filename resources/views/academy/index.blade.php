@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-size: 2.5rem; font-weight: 600; color: #333;">학원 정보</h1>
    <div class="row">
        @foreach($academyInfos as $info)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $info->academy_name }}</h5>
                    <p class="card-text">{{ $info->road_name_address }}</p>
                    <a href="/academy_info/{{ $info->id }}" class="btn btn-primary">자세히 보기</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Laravel 기본 페이징 링크 표시 -->
    <div class="pagination justify-content-center">
        {{ $academyInfos->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var page = 1;

        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function() {
                    $('.ajax-load').show();
                }
            }).done(function(response) {
                if (response.data.length === 0) {
                    $('.ajax-load').html("데이터가 더 이상 없습니다");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(renderData(response.data));
            }).fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('서버 응답이 없습니다.');
            });
        }

        function renderData(data) {
            var html = '';
            if (Array.isArray(data)) {
                for(var item of data) {
                    html += '<div class="col-md-4 mb-3">';
                    html += '    <div class="card">';
                    html += '        <div class="card-body">';
                    html += `            <h5 class="card-title">${item.academy_name}</h5>`;
                    html += `            <p class="card-text">${item.road_name_address}</p>`;
                    html += `            <a href="/academy_info/${item.id}" class="btn btn-primary">자세히 보기</a>`;
                    html += '        </div>';
                    html += '    </div>';
                    html += '</div>';
                }
            }
            return html;
        }
    });
</script>
@endsection
