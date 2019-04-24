@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">Edit Your Employee</div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ $company->path() }}/employees"
                        >
                            @method('PATCH')

                            @include ('employees._form', [
                                'buttonText' => 'Update Employee'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
