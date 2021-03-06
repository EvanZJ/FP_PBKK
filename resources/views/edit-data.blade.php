@extends('layouts.navbar')
@section('container')
<center><h3>{{__('login.edit-data-title')}}</h3></center>
<hr>
    <form id="form-login" action="/update/{{ $item->id }}" method="POST">
        @csrf
        <div class="">
            <label for="recipient-name" class="col-form-label">{{__('login.edit-data-name')}}:</label>
            <input type="text" class="form-control" id="name" name="name"
            value="{{ $item->name ? $item->name : 'No data!' }}">
        </div>
        <div class="">
            <label for="message-text" class="col-form-label">{{__('login.edit-data-slug')}}:</label>
            <input type="text" class="form-control" id="slug" name="slug"
            value="{{ $item->slug ? $item->slug : 'No data!' }}">
        </div>
        <div class="">
            <label for="message-text" class="col-form-label">{{__('login.edit-data-categories')}}:</label>
            <input type="number" class="form-control" id="categories_id" name="categories_id"
            value="{{ $item->categories_id ? $item->categories_id : 'No data!' }}">
        </div>
        <div class="">
            <label for="message-text" class="col-form-label">Desc:</label>
            <input type="text" class="form-control" id="desc" name="desc" value="{{ $item->desc ? $item->desc : 'No data!' }}"></textarea>
        </div>
        <div class="">
            <label for="message-text" class="col-form-label">{{__('login.edit-data-price')}}:</label>
            <input type="number" class="form-control" id="price" name="price"
            value="{{ $item->price ? $item->price : 'No data!' }}">
        </div>
        <div class="">
            <label for="message-text" class="col-form-label">{{__('login.edit-data-stock')}}:</label>
            <input type="number" class="form-control" id="stock" name="stock"
            value="{{ $item->stock ? $item->stock : 'No data!' }}">
        </div>
        <br>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" form="form-login">Edit Data</button>
        </div>
    </form>
@endsection