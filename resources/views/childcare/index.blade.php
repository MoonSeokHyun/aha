@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-size: 2.5rem; font-weight: 600; color: #333;">어린이집 정보</h1>

    <select id="region-select" class="form-select mb-4" style="max-width: 300px; margin: auto;">
        <option value="">지역 선택</option>
        <option value="서울">서울</option>
        <option value="경기도">경기도</option>
        <option value="강원도">강원도</option>
        <option value="충청북도">충청북도</option>
        <option value="충청남도">충청남도</option>
        <option value="전라북도">전라북도</option>
        <option value="전라남도">전라남도</option>
        <option value="경상북도">경상북도</option>
        <option value="경상남도">경상남도</option>
        <option value="제주도">제주도</option>
    </select>
    

    <div class="row" id="post-data" style="box-shadow: 0px 0px 20px rgba(0,0,0,0.1);">
        @foreach($centers as $center)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $center->name }}</h5>
                    <p class="card-text">{{ $center->address }}</p>
                    <a href="/childcare/{{ $center->id }}" class="btn btn-primary">어린이집 바로가기</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        <div class="ajax-load text-center" style="display:none;">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif"> Loading More post</p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let page = 1;
    let region = '';

    $('#region-select').change(function() {
        region = $(this).val();
        page = 1;
        $("#post-data").empty();
        loadMoreData(page, region);
    });

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            page++;
            loadMoreData(page, region);
        }
    });

    function loadMoreData(page, region) {
        $.ajax({
            url: '?page=' + page + '&region=' + region,
            type: 'get',
            beforeSend: function() {
                $('.ajax-load').show();
            }
        }).done(function(data) {
            if (data.data.length === 0) {
                $('.ajax-load').html("No more records found");
                return;
            }
            $('.ajax-load').hide();
            $("#post-data").append(renderData(data.data));
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('Server not responding...');
        });
    }

    function renderData(data) {
        let html = '';
        for(let item of data) {
            html += `<div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <p class="card-text">${item.address}</p>
                                <a href="/childcare/${item.id}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>`;
        }
        return html;
    }
});
</script>

@endsection
