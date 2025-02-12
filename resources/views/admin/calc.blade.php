@extends('template.app')
@section('title','SAW method calculations')
@section('pagetitle','SAW method calculations')
@section('content')
<div class="container-fluid">
    <div class="accordion" id="calculationAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-calc">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                    data-bs-target="#calculation" aria-expanded="false" aria-controls="calculation">
                    <h4>calculation</h4>
                </button>
            </h2>
            <div class="accordion-collapse collapse" id="calculation" data-bs-parent="#calculationAccordion">
                <div class="accordion-body">
                    <form action="{{ route('calc.process') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="idAlternative" class="col-form-label col-md-3">Alternative</label>
                            <div class="col-md">
                                <select name="idAlternative" id="idAlternative" class="form-control">
                                    <option value="">--Choose--</option>
                                    @foreach ($alternative as $item)
                                    <option value="{{ $item->id }}">{{ $item->car }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @foreach ($criteria as $key => $value)
                        @php
                        $key += 1
                        @endphp
                        <div class="form-group row">
                            <label for="idCriteria{{ $key }}"
                                class="col-form-label col-md-3">{{ $value->criteria_name }}</label>
                            <div class="col-md">
                                <select name="idCriteria{{ $key }}" id="idCriteria{{ $key }}" class="form-control">
                                    <option value="">--Choose--</option>
                                    @foreach ($subcriteria[$value->id] as $k => $v)
                                    <option value="{{ $v->value }}">{{ $v->subcriteria_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm form-control">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="accrodion-item">
            <h2 class="accordion-header" id="heading-evaluation">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                    data-bs-target="#evaluationTable">
                    <h4>Evaluation table</h4>
                </button>
            </h2>
            <div class="accordion-collapse collapse" id="evaluationTable" data-bs-parent="calculationAccordion">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th rowspan="2">#</th>
                                    <th rowspan="2">Alternative (Car)</th>
                                    <th colspan="{{ count($criteria) }}" class="text-center">Criteria</th>
                                </tr>
                                <tr>
                                    @foreach ($criteria as $item)
                                    <th>{{ $item->criteria_name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1
                                @endphp
                                @foreach ($evaluation as $key => $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $key }}</td>
                                    @foreach ($evaluation[$key] as $k => $v)
                                    @foreach ($evaluation[$key][$k] as $item)
                                    <td>{{ $item }}</td>
                                    @endforeach
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="accrodion-item">
            <h2 class="accordion-header" id="heading-normalized">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                    data-bs-target="#normalizedTable">
                    <h4>Normalize table</h4>
                </button>
            </h2>
            <div class="accordion-collapse collapse" id="normalizedTable" data-bs-parent="calculationAccordion">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th rowspan="2">#</th>
                                    <th rowspan="2">Alternative (Car)</th>
                                    <th colspan="{{ count($criteria) }}" class="text-center">Criteria</th>
                                </tr>
                                <tr>
                                    @foreach ($criteria as $item)
                                    <th>{{ $item->criteria_name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1
                                @endphp
                                @foreach ($normalized as $key => $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $key }}</td>
                                    @foreach ($normalized[$key] as $k => $v)
                                    <td>{{ $v }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="accrodion-item">
            <h2 class="accordion-header" id="heading-wieghtedNormalization">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                    data-bs-target="#wieghtedNormalizationTable">
                    <h4>Weighted Normalization table</h4>
                </button>
            </h2>
            <div class="accordion-collapse collapse" id="wieghtedNormalizationTable"
                data-bs-parent="calculationAccordion">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th rowspan="2">#</th>
                                    <th rowspan="2">Alternative (Car)</th>
                                    <th colspan="{{ count($criteria) }}" class="text-center">Criteria</th>
                                </tr>
                                <tr>
                                    @foreach ($criteria as $item)
                                    <th>{{ $item->criteria_name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1
                                @endphp
                                @foreach ($weightedNormalization as $key => $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $key }}</td>
                                    @foreach ($weightedNormalization[$key] as $k => $v)
                                    <td>{{ $v }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="accrodion-item">
            <h2 class="accordion-header" id="heading-result">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                    data-bs-target="#resultTable">
                    <h4>Result</h4>
                </button>
            </h2>
            <div class="accordion-collapse collapse" id="resultTable" data-bs-parent="calculationAccordion">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Alternative (Car)</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1
                                @endphp
                                @foreach ($result as $key => $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
