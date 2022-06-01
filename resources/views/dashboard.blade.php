@extends('layouts.navbar')

@section('container')
    @if (Session::has('successful_login'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
        <strong><i class="fa fa-check-circle"></i>Success!</strong>
        <br>
            Successfully Login!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <br>
    @endif
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/wp2163489.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item ">
            <img src="/outdoor1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/gamingroom.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <h1>{{__('login.dashComp')}}</h1>
    <h3>
      <div class="d-flex justify-content-between">
        <div>
          {{__('login.dashComp1')}}
        </div>
        @if ($type == 1)
          <div>
            <a href="#" style="text-decoration: none">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Add Products
              </div>
            </a>
          </div>
          <div>
            <a href="#" style="text-decoration: none">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Add Categories
              </div>
            </a>
          </div>
        @endif
      </div>
    </h3>
    <hr>
    <div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($categories as $category)
      <div class="col">
        <div class="card">
          <img src="{{ asset('/') . $category->slug . '.png'}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <div class="d-flex justify-content-between">
              <p class="card-text">These are some high qualities furniture!</p>
              <a href="/products/{{ $category->slug }}">
                <button type="button" class="btn btn-outline-primary">
                  Details
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <br>
  </div>
@endsection
