@extends('layouts.navbar')

@section('container')
    @if (Session::has('successful_login'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
        <strong><i class="fa fa-check-circle"></i>Success!</strong>
        <br>
            Successfully Login!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        <br>
    </div>
    @endif
    @if (Session::has('not_admin'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i>Not allowed! You are not admin!</strong>
            <br>
                Only admin can access this!
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
            <a href="{{ route('list-products') }}" style="text-decoration: none">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Add Products
              </div>
            </a>
          </div>
          <div>
            <a href="{{ route('list-categories') }}" style="text-decoration: none">
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
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
          </div>
          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
          </ul>
        </footer>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
