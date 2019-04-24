@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">Edit Your Company</div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ $company->path() }}"
                        >
                            @method('PATCH')

                            @include ('companies._form', [
                                'buttonText' => 'Update Company'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
