@extends('template.app')
@section('title','Manage criteria car data')
@section('pagetitle','Manage criteria car data')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i> new data</button>
                <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add new data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('criteria.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group row">
                                        <label for="criteria_name" class="col-form-label col-md-3">Criteria name</label>
                                        <div class="col-md">
                                            <input type="text" name="criteria_name" id="criteria_name" class="form-control" placeholder="input criteria name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="type" class="col-form-label col-md-3">Type</label>
                                        <div class="col-md">
                                            <select name="type" id="type" class="form-control">
                                                <option value="">--Choose--</option>
                                                <option value="cost">cost</option>
                                                <option value="benefit">benefit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="weight" class="col-form-label col-md-3">weight</label>
                                        <div class="col-md">
                                            <input type="text" name="weight" id="weight" class="form-control" placeholder="input weight">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped" id="basic-datatables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Criteria name</th>
                                <th>Type</th>
                                <th>Weight</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                            @foreach ($criteria as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->criteria_name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->weight }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{ $item->id }}"><i class="fas fa-edit"></i></button>
                                            <div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update data criteria</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('criteria.update',$item->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group row">
                                                                    <label for="criteria_name" class="col-form-label col-md-3">Criteria name</label>
                                                                    <div class="col-md">
                                                                        <input type="text" name="criteria_name" id="criteria_name" class="form-control" value="{{ $item->criteria_name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="type" class="col-form-label col-md-3">Type</label>
                                                                    <div class="col-md">
                                                                        <select name="type" id="type" class="form-control">
                                                                            <option value="{{ $item->type == 'cost' ? 'cost' : 'benefit' }}">{{ $item->type == 'cost' ? 'cost' : 'benefit' }}</option>
                                                                            <option value="{{ $item->type != 'cost' ? 'cost' : 'benefit' }}">{{ $item->type != 'cost' ? 'cost' : 'benefit' }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="weight" class="col-form-label col-md-3">weight</label>
                                                                    <div class="col-md">
                                                                        <input type="text" name="weight" id="weight" class="form-control" value="{{ $item->weight }}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}"><i class="fas fa-trash-alt"></i></button>
                                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirmation!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do you want to delete it?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('criteria.destroy',$item->id) }}" method="post">
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