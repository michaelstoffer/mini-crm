@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center justify-content-between">User's <a href="/users/create" class="btn btn-link">New User</a></div>

                    <div class="card-body d-flex flex-wrap justify-content-around">
                        @forelse ($users as $user)
                            <div class="mb-3">
                                @include ('users.card')
                            </div>
                        @empty
                            <div>No users yet.</div>
                        @endforelse
                    </div>
                </div>
                {{ $users->render() }}
            </div>
        </div>
    </div>
@endsection
