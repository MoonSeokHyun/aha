@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row" id="post-data">
        @foreach($centers as $center)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $center->name }}</h5>
                    <p class="card-text">{{ $center->address }}</p>
                    <a href="/childcare/{{ $center->id }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="ajax-load text-center" style="display:none">
    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
</div>


<script>
$(document).ready(function() {
    let page = 1;

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
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
            html += `<div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <p class="card-text">${item.address}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>`;
        }
        return html;
    }
});
</script>

@endsection



