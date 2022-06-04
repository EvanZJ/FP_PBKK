@extends('layouts.navbar')
@section('container')
<center><h3>Products</h3></center>
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
    @if (Session::has('successful_create'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i>Success!</strong>
            <br>
                Successfully Created!
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
        Create New Products
    </button>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Furniture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-create" action="{{ route('create-products') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                        value="">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Slug:</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                        value="">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Categories:</label>
                        <input type="number" class="form-control" id="categories_id" name="categories_id"
                        value="">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Desc:</label>
                        <input type="text" class="form-control" id="desc" name="desc" value=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Price:</label>
                        <input type="number" class="form-control" id="price" name="price"
                        value="">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock"
                        value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-create">Create New Furniture</button>
            </div>
            </div>
        </div>
    </div>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Name</th>
            <th scope="col" style="text-align: center;">Slug</th>
            <th scope="col" style="text-align: center;">Categories</th>
            <th scope="col" style="text-align: center;">Price</th>
            <th scope="col" style="text-align: center;">Stock</th>
            <th scope="col" style="text-align: center;">Action</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach ($furniture as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td style="text-align: center;">{{ $item->name }}</td>
            <td style="text-align: center;">{{ $item->slug }}</td>
            <td style="text-align: center;">{{ $item->categories_id }}</td>
            <td style="text-align: center;">{{ $item->price }}</td>
            <td style="text-align: center;">{{ $item->stock }}</td>
            <td>
                <div class="d-flex justify-content-evenly">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" data-bs-whatever="@mdo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Edit
                    </button>
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Edit Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-login{{ $item->id }}" action="{{ route('update-products', $item->id) }}" method="POST">
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
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Categories:</label>
                                            <input type="number" class="form-control" id="categories_id" name="categories_id"
                                             value="{{ $item->categories_id ? $item->categories_id : 'No data!' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Desc:</label>
                                            <input type="text" class="form-control" id="desc" name="desc" value="{{ $item->desc ? $item->desc : 'No data!' }}"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Price:</label>
                                            <input type="number" class="form-control" id="price" name="price"
                                             value="{{ $item->price ? $item->price : 'No data!' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Stock:</label>
                                            <input type="number" class="form-control" id="stock" name="stock"
                                             value="{{ $item->stock ? $item->stock : 'No data!' }}">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" form="form-login{{ $item->id }}">Edit Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBackdrop{{ $item->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteBackdrop{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel{{ $item->id }}">Delete Products</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you sure want to delete?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('delete-products', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button submit" class="btn btn-danger">Delete {{ $item->id }}</button>
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