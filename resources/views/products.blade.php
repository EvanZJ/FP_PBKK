@extends('layouts.navbar')

@section('container')
    <h1>{{ $category->name }}</h1>
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
                        <b>
                            {{ $item->name }}
                        </b>
                    </h5>
                    <p class="card-text">{{ $item->desc }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Stock : {{ $item->stock }}</small>
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
        {{--  <div class="card mb-3" style="max-width:100%;">
            <div class="row g-0">
                <div class="col-md-1 text-center">
                    <img src="/kursi-kayu/1.jpg" width="100%" height = "100%" class="img-fluid rounded-start" alt="...">
                </div>
                
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">
                            <small>
                                {{ $item->desc }}
                            </small>
                        </p>
                        <p class="card-text">
                            <b>
                                Price : {{ $item->price }}
                            </b>
                        </p>
                        <a href="/item/{{ $item->slug }}">
                            <button type="button" class="btn btn-outline-primary">Primary</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>  --}}
    @endforeach
    </div>
@endsection
