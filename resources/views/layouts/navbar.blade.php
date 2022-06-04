<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Document</title>
    <link href="http://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        @import url('http://fonts.cdnfonts.com/css/sf-pro-display');
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color:#222D64">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <img src="/logopbkk.png" alt="" width="100" height="100" class="d-inline-block align-text-top">
                        </a>
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1 " style="color:#DCCE23">{{ $name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="color:#DCCE23">
                            <li><a class="dropdown-item" href="#">{{__('login.navSetting')}}</a></li>
                            <li><a class="dropdown-item" href="#">{{__('login.navProfile')}}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('signout') }}">{{__('login.navSignOut')}}</a></li>
                        </ul>
                    </div>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0"> 
                                <span class="ms-1 d-none d-sm-inline" style="color:#DCCE23">{{__('login.navHome')}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline" style="color:#DCCE23">{{__('login.navProduct')}}</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                @foreach ($categories as $category)
                                    <li class="w-100">
                                        <a href="/products/{{ $category->slug }}" class="nav-link px-0" style="color:#DCCE23"> <span class="d-none d-sm-inline">{{ $category->name }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('cart') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline" style="color:#DCCE23">{{__('login.navOrder')}}</span></a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline" style="color:#DCCE23">{{__('login.navLang')}}</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="/login/id" class="nav-link px-0"> 
                                        <img src="/Flag_of_Indonesia.svg.png" alt="" width="25" height="15" class="d-inline-block align-text-top">
                                        <span class="d-none d-sm-inline" style="color:#DCCE23">ID</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/login/en" class="nav-link px-0"> 
                                        <img src="/Flag_of_Great_Britain_(1707–1800).svg.png" alt="" width="25" height="15" class="d-inline-block align-text-top">
                                        <span class="d-none d-sm-inline" style="color:#DCCE23">EN</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline" style="color:#DCCE23">{{__('login.navHistory')}}</span> </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="container-fluid col py-3">
                @yield('container')
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
</html>