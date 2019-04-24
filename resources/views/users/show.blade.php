@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0">
                                {{ $user->name }}
                                @foreach ($user->roles as $role)
                                    ({{ $role->name }})
                                @endforeach
                            </h5>
                            <p class="m-0 p-0">
                                <a href="{{ $user->path().'/edit' }}" class="btn btn-link">Edit User</a>
                            </p>
                        </div>
                        <p class="card-text m-0"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                    </div>
                </div>

                @if (auth()->user()->hasRole('Administrator'))
                    <div class="card mb-3">
                        <div class="card-header">
                            Assign Role to User
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ $user->path() }}/add-role">
                                @method('PATCH')
                                @csrf
                                <div class="input-group">
                                    <select class="custom-select" id="role" name="role" aria-label="Assign Role to User">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"{{ $user->hasRole($role->name) ? ' selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Assign Role</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Assign Company to User
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ $user->path() }}/add-company">
                                @method('PATCH')
                                @csrf
                                <div class="input-group">
                                    <select class="custom-select" id="company" name="company" aria-label="Assign Company to User">
                                        @foreach ($companies as $company)
                                            @if ( ! $user->hasManager($company->name))
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Assign Company</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        Company's
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($user->companies as $company)
                            <li class="list-group-item"><a href="">{{ $company->name }}</a></li>
                        @empty
                            <div class="p-3">No companies yet.</div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
