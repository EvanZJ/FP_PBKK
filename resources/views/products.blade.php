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
                            <a href="/">
                                <button type="button" class="btn btn-primary">Detail</button>
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
