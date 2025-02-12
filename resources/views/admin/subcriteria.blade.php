@extends('template.app')
@section('title','Manage subcriteria car data')
@section('pagetitle','Manage subcriteria car data')
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
                                <form action="{{ route('subcriteria.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group row">
                                        <label for="idCriteria" class="col-form-label col-md-3">Criteria name</label>
                                        <div class="col-md">
                                            <select name="idCriteria" id="idCriteria" class="form-control">
                                                <option value="">--Choose--</option>
                                                @foreach ($criteria as $item)
                                                    <option value="{{ $item->id }}">{{ $item->criteria_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subcriteria_name" class="col-form-label col-md-3">Subcriteria name</label>
                                        <div class="col-md">
                                            <input type="text" name="subcriteria_name" id="subcriteria_name" class="form-control" placeholder="Input subcriteria name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="info" class="col-form-label col-md-3">Info</label>
                                        <div class="col-md">
                                            <textarea name="info" id="info" cols="10" rows="5" class="form-control" placeholder="Input Information about subcriteria"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="value" class="col-form-label col-md-3">Value</label>
                                        <div class="col-md">
                                            <input type="text" name="value" id="value" class="form-control" placeholder="Input value">
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
                                <th>Criteria</th>
                                <th>Subcriteria name</th>
                                <th>Info</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                            @foreach ($subcriteria as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->criteria->criteria_name }}</td>
                                    <td>{{ $item->subcriteria_name }}</td>
                                    <td>{{ $item->info }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{ $item->id }}"><i class="fas fa-edit"></i></button>
                                            <div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('subcriteria.update',$item->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group row">
                                                                    <label for="idCriteria" class="col-form-label col-md-3">Criteria name</label>
                                                                    <div class="col-md">
                                                                        <select name="idCriteria" id="idCriteria" class="form-control">
                                                                            @foreach ($criteria as $crt)
                                                                            <option value="{{ $crt->id }}" {{ $item->criteria->id == $crt->id ? 'selected' : '' }}>{{ $crt->criteria_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="subcriteria_name" class="col-form-label col-md-3">Subcriteria name</label>
                                                                    <div class="col-md">
                                                                        <input type="text" name="subcriteria_name" id="subcriteria_name" class="form-control" value="{{ $item->subcriteria_name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="info" class="col-form-label col-md-3">Info</label>
                                                                    <div class="col-md">
                                                                        <textarea name="info" id="info" cols="10" rows="5" class="form-control">{{ $item->info }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="value" class="col-form-label col-md-3">Value</label>
                                                                    <div class="col-md">
                                                                        <input type="text" name="value" id="value" class="form-control" value="{{$item->value}}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
                                                            <form action="{{ route('subcriteria.destroy',$item->id) }}" method="post">
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