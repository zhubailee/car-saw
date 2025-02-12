@extends('template.app')
@section('title','Manage alternative car data')
@section('pagetitle','Manage alternative car data')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#addData"><i class="fas fa-plus"></i> new data</button>
            <div class="modal fade" id="addData" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add new data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('alternative.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group row">
                                    <label for="car" class="col-form-label col-md-2">Car name:</label>
                                    <div class="col-md">
                                        <input type="text" name="car" id="car" class="form-control"
                                            placeholder="input car name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-form-label col-md-2">Description:</label>
                                    <div class="col-md">
                                        <textarea name="description" id="description" cols="10" rows="5"
                                            class="form-control" placeholder="input description"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">save</button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-bs-dismiss="modal">cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-hover table-striped" id="basic-datatables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Car Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1
                        @endphp
                        @foreach ($alternative as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->car }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-outline-primary btn-sm mr-3"
                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i
                                            class="fas fa-edit"></i></button>
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Data</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('alternative.update',$item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row">
                                                            <label for="car" class="col-form-label col-md-2">Car
                                                                name:</label>
                                                            <div class="col-md">
                                                                <input type="text" name="car" id="car"
                                                                    class="form-control" value="{{ $item->car }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="description"
                                                                class="col-form-label col-md-2">Description:</label>
                                                            <div class="col-md">
                                                                <textarea name="description" id="description" cols="10"
                                                                    rows="5"
                                                                    class="form-control">{{ $item->description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">Update</button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id }}"><i
                                            class="fas fa-trash-alt"></i></button>
                                    <div class="modal fade" tabindex="-1" id="deleteModal{{ $item->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirmation!</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Do you want to delete it?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('alternative.destroy',$item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
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
        </div>
    </div>
</div>
@endsection
