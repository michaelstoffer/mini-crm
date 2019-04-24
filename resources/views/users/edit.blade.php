@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">Edit Your User</div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ $user->path() }}"
                        >
                            @method('PATCH')

                            @include ('users._form', [
                                'buttonText' => 'Update User'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
