@extends('layouts.appold')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
                <h1>Welcome To Asia Pasific Journal Of Multidisciplinary Research</h1>
         
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('img/carousel.jpg')}}" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/carousel.jpg')}}" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/carousel.jpg')}}" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Author Guidelines</h5>
                          <p class="card-text">For paper submission, the research article must be an original copy, about 3,000-5,000 words, single-spaced... </p>
                          <a href="{{ route('authorguidelines.front')}}" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Review Process</h5>
                          <p class="card-text">An author accepts the responsibility of preparing the research paper for evaluation by independent reviewers...</p>
                          <a href="{{ route('reviewprocess.front')}}" class="btn btn-primary">View</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
    </div>
</div>
@endsection
