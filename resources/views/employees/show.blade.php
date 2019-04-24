@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                            <a href="{{ $employee->path().'/edit' }}" class="btn btn-link">Edit Employee</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text m-0"><a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></p>
                        <p class="card-text m-0"><a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0"><a href="{{ $company->path() }}">{{ $company->name }}</a></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text m-0"><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></p>
                        <p class="card-text m-0"><a href="{{ $company->website }}">{{ $company->website }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
