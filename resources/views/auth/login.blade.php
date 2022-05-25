<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
    <title>Login</title>
    <link href="http://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid" style="background-color:#222D64;">
            <div class="row">
                <div class="col-lg-5 text-black">
                    <div class="px-5 ms-xl-4">
                        <img src="/logopbkk.png" class="img-fluid" alt="Responsive image">
                    </div>
                    @if (Session::has('failed_login'))
                        <br>
                        <div class="alert alert-danger alert-dismissible fade show px-5 ms-xl-4" role="alert">
                            <strong><i class="fa fa-check-circle"></i>Failed!</strong>
                                <br>
                                Wrong Password or Username!
                        </div>
                    @endif
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                        <form style="width: 39rem;" action="{{ route('login.custom') }}" method="POST">
                            @csrf
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;color:white;">
                                <b>
                                    {{__('login.title')}}
                                </b>
                            </h3>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color:white;">{{__('login.profile.email')}}</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">{{__('login.profile.messmail')}}</div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label" style="color:white;">{{__('login.profile.pw')}}</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('login.button')}}</button>
                            <br>
                            <br>
                            <p style="color:white;">{{__('login.toRegist')}} <a href="{{ route('register-user') }}" class="link-info" style="color:white;">{{__('login.linkRegist')}}</a></p>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 px-0 d-none d-sm-block">
                    <img src="/page__en_us_15700878770.jpeg"
                    alt="Login image" class="w-10 vh-10" style="object-fit:100%;object-position:right;">
                </div>
            </div>
        </div>
    </section>
</body>
</html>