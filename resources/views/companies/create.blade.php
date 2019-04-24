@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">Let's create a new company</div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="/companies"
                        >
                            @include ('companies._form', [
                                'company' => new App\Company,
                                'buttonText' => 'Create Company'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
