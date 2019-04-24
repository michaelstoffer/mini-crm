@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">Let's create a new user</div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="/users"
                        >
                            @include ('users._form', [
                                'user' => new App\User,
                                'buttonText' => 'Create User'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
