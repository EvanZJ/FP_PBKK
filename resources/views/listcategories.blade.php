@extends('layouts.navbar')

@section('container')
<center><h3>Categories</h3></center>
<hr>
<div class="container">
    @if (Session::has('successful_edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i>{{__('login.listcategories-success')}}</strong>
            <br>
                {{__('login.listcategories-successedit')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            <br>
        </div>
    @endif
    @if (Session::has('successful_delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i>{{__('login.listcategories-success')}}</strong>
            <br>
                {{__('login.listcategories-successdel')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            <br>
        </div>
    @endif
    @if (Session::has('successful_create'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i>{{__('login.listcategories-success')}}</strong>
            <br>
                {{__('login.listcategories-successcreate')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            <br>
        </div>
    @endif
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
        </svg>
        {{__('login.listcategories-crete-category')}}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">{{__('login.listcategories-crete-furniture')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-create" action="{{ route('create-categories') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">{{__('login.edit-data-name')}}:</label>
                        <input type="text" class="form-control" id="name" name="name"
                        value="">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">{{__('login.edit-data-slug')}}:</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                        value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('login.listcategories-button')}}</button>
                <button type="submit" class="btn btn-primary" form="form-create">{{__('login.crete-category')}}</button>
            </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">#</th>
                <th scope="col" style="text-align: center;">{{__('login.edit-data-name')}}</th>
                <th scope="col" style="text-align: center;">{{__('login.edit-data-slug')}}</th>
                <th scope="col" style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <th scope="row" style="text-align: center;">{{ $item->id }}</th>
                <td style="text-align: center;">{{ $item->name }}</td>
                <td style="text-align: center;">{{ $item->slug }}</td>
                <td>
                    <div class="d-flex justify-content-evenly">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-login{{ $item->id }}" action="{{ route('update-categories', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">{{__('login.edit-data-name')}}:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                             value="{{ $item->name ? $item->name : 'No data!' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">{{__('login.edit-data-slug')}}:</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                             value="{{ $item->slug ? $item->slug : 'No data!' }}">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('login.listcategories-button')}}</button>
                                    <button type="submit" class="btn btn-primary" form="form-login{{ $item->id }}">Edit</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBackdrop{{ $item->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                            {{__('login.listcategories-del')}}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteBackdrop{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel{{ $item->id }}">{{__('login.listcategories-del1')}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{__('login.listcategories-del2')}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('login.listcategories-button')}}</button>
                                <form action="{{ route('delete-categories', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button submit" class="btn btn-danger">{{__('login.listcategories-del')}} {{ $item->id }}</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection