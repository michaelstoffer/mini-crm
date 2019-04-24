@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img class="card-img-top" src="{{ asset($company->logo) }}" alt="{{ $company->name }}">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0">{{ $company->name }}</h5>
                            <p class="m-0 p-0">
                                <a href="{{ $company->path().'/logo/create' }}" class="btn btn-link">Upload Logo</a>
                                <a href="{{ $company->path().'/edit' }}" class="btn btn-link">Edit Company</a>
                            </p>
                        </div>
                        <p class="card-text m-0"><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></p>
                        <p class="card-text m-0"><a href="//{{ $company->website }}">{{ $company->website }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        Employee's
                        <a href="{{ $company->path() }}/employees/create" class="btn btn-link p-0">New Employee</a>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($employees as $employee)
                            <li class="list-group-item"><a href="{{ $employee->path() }}">{{ $employee->first_name }} {{ $employee->last_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                {{ $employees->render() }}
            </div>
        </div>
    </div>
@endsection
