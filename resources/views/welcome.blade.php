@extends('layouts.layout')

@section('content')
    <h2>Featured Childcare Centers</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="image1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Center 1</h5>
                    <p class="card-text">This is a short description of this childcare center.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="image2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Center 2</h5>
                    <p class="card-text">This is a short description of this childcare center.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="image3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Center 3</h5>
                    <p class="card-text">This is a short description of this childcare center.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
@endsection
