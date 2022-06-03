@extends('layouts.navbar')

@section('container')
<center><h3>Categories</h3></center>
<hr>
<div class="container">
    @if (Session::has('successful_edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i>Success!</strong>
            <br>
                Successfully Edited!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            <br>
        </div>
    @endif
    @if (Session::has('successful_delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i>Success!</strong>
            <br>
                Successfully Deleted!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            <br>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">#</th>
                <th scope="col" style="text-align: center;">Name</th>
                <th scope="col" style="text-align: center;">Slug</th>
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
                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                             value="{{ $item->name ? $item->name : 'No data!' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Slug:</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                             value="{{ $item->slug ? $item->slug : 'No data!' }}">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" form="form-login{{ $item->id }}">Edit</button>
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