<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
    <title>Login</title>
    <link href="http://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid" style="background-color:#002368;">
            <div class="row">
                <div class="col-lg-5 text-black">
                    <div class="px-5 ms-xl-4">
                        <img src="/logopbkk.png" class="img-fluid">
                    </div>
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                        <form style="width: 39rem;" action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;color:white;">
                                {{__('login.title2')}}
                            </h3>
                            <div class="mb-3">
                                <label for="name" class="form-label" style="color:white;">{{__('login.profile.name')}}</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color:white;">{{__('login.profile.email')}}</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">{{__('login.profile.messmail')}}</div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label" style="color:white;">{{__('login.profile.pw')}}</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <br>
                            <br>
                            <p style="color:white;">{{__('login.toLogin')}} <a href="{{ route('login') }}" class="link-info" style="color:white;">{{__('login.linkLogin')}}</a></p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="/page__en_us_15700878770.jpeg"
                    alt="Login image" class="w-10 vh-10" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
</body>
</html>