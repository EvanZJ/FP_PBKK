@extends('layouts.navbar')

@section('container')
<div class="container">
    <div class="accordion" id="accordionExample">
        <h1>
            Transaction
        </h1>
        <hr>
        @php
        $it = 0;
        @endphp
        @foreach ($transaction as $item)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $it }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $it }}" aria-expanded="true" aria-controls="collapseOne">
                    Transaction : {{ $it }}
                    <br>
                    <br>
                    {{ $item->created_at->diffForHumans() }}
                    </button>
                </h2>
                <div id="collapse{{ $it }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $it }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Item</th>
                                <th scope="col">Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $iter = 1;
                                @endphp
                                @foreach ($item->list_transaction as $purchase)
                                    <tr>
                                        <th scope="row">{{ $iter }}</th>
                                        <td>
                                            <img src="/{{ $purchase->furniture->slug }}/1.jpg" alt="" width="100" height="100" class="img-responsive">
                                        </td>
                                        <td>{{ $purchase->furniture->name }}</td>
                                        <td>{{ $purchase->amount }}</td>
                                    </tr>
                                    @php
                                        $iter += 1;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <b>
                                Total : {{ $item->total_price }}
                            </b>
                        </div>
                    </div>
                </div>
                @php
                    $it += 1;
                @endphp
            </div>
            <br>
        @endforeach
    </div>
</div>
@endsection