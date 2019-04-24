@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">Let's create a new employee</div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ $company->path() }}/employees"
                        >
                            @include ('employees._form', [
                                'employee' => new App\Employee,
                                'buttonText' => 'Create Employee'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
