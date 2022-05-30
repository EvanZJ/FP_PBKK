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
    @endif
    <br>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/wp2163489.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
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
    <h3>{{__('login.dashComp1')}}</h3>
    <hr>
    @foreach ($categories as $category)
      <div class="card bg-dark text-black">
        <img src="{{ asset('/') . $category->slug . '.png'}}" class="card-img" alt="...">
        <div class="card-img-overlay">
          <h1>{{ $category->name }}</h1>
        </div>
      </div>
      <br>
    @endforeach
  </div>
@endsection
