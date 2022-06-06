@extends('layouts.navbar')

@section('container')
@if (Session::has('successful_cart'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
        <strong><i class="fa fa-check-circle"></i>Success!</strong>
        <br>
            Successfully added to cart!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
        <br>
    </div>
@endif
<style>
    .dropdown-menu {
        width: 400px !important;
    }
</style>
    <div class="d-flex justify-content-between">
        <h1>{{ $category->name }}</h1>
        {{--  <div class="container">
            <div class="row">  --}}
        {{--  <div class="col-lg-12 col-sm-12 col-12 main-section">  --}}
        <div class="dropdown">
            <button type="button" class="btn btn-success dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                </li>
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    <li>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <img src="/{{ $details['image'] }}/1.jpg" class="img-fluid rounded-start" alt="...">
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $details['name'] }}</h5>
                                  <div class="justify-content-between" style="width: 100%">
                                    <small>
                                        Price : {{ $details['price'] }}
                                    </small>
                                    <small>
                                        Quantity:{{ $details['quantity'] }}
                                    </small>
                                  </div>
                                  {{--  <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>                                </div>  --}}
                              </div>
                            </div>
                        </div>
                        {{--  <div class="card" style="width: 10rem;">
                            <img src="/{{ $details['image'] }}/1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $details['name'] }}</h5>
                            </div>
                            <div class="card-body">
                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                            </div>
                        </div>  --}}
                        {{--  <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="/{{ $details['image'] }}/1.jpg"/>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p>{{ $details['name'] }}</p>
                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                            </div>
                        </div>  --}}
                    </li>
                    @endforeach
                @endif
                <li>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        {{--  </div>  --}}
            {{--  </div>
        </div>  --}}
    </div>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @php
        $it = 1;
    @endphp
    @foreach ($category->Furniture as $item)
        <div class="col">
            <div class="card h-100">
                {{--  <img src="/kursi-kayu/1.jpg" class="card-img-top" alt="...">  --}}
                <div id="carouselExampleControls{{ $it }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $at = 1;
                        @endphp
                        @foreach ($item->ImageFurniture as $images)
                            @if ($at == 1)
                                <div class="carousel-item active">
                                    <img src="/{{ $item->slug }}/{{ $images->link }}" class="d-block w-100" alt="...">
                                </div>
                            @else
                                <div class="carousel-item ">
                                    <img src="/{{ $item->slug }}/{{ $images->link }}" class="d-block w-100" alt="...">
                                </div>
                            @endif
                            @php
                                $at += 1;
                            @endphp
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{ $it }}" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{ $it }}" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/item/{{ $item->slug }}" style="text-decoration: none">
                            <b>
                                {{ $item->name }}
                            </b>
                        </a>
                    </h5>
                    <p class="card-text">{{ $item->desc }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Stock : {{ $item->stock }}</small>
                        <small>
                            <a href="{{ route('addtocart', $item->id) }}">
                                <button type="button" class="btn btn-success">Add to Cart</button>
                            </a>
                        </small>
                        <small>
                            <b>
                                Price : {{ $item->price }}
                            </b>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @php
            $it+=1;
        @endphp
    @endforeach
    </div>
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
@endsection
