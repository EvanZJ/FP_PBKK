<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Thank you for your purchase!
    </h1>
    <ul>
        <li>
            @foreach ($product as $id => $details)
                {{ $details['name'] }}
                {{ $details['quantity'] }}
                <br>
                {{--  <li>
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
                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>                                </div>
                            </div>
                        </div>
                    </div>
                </li>  --}}
            @endforeach
        </li>
        <li>
            @php $total = 0 @endphp
            @foreach ($product as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
            @endforeach
            <p>
                Total Price : {{ $total }}
            </p>
        </li>
        <li>
            <img src="/gamingroom.png" alt="">
        </li>
    </ul>
</body>
</html>