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
@endsection
