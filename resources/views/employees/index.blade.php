@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center justify-content-between">Employee's</div>

                    <div class="card-body d-flex flex-wrap justify-content-around">
                        @forelse ($employees as $employee)
                            <div class="mb-3">
                                @include ('employees.card')
                            </div>
                        @empty
                            <div>No employees yet.</div>
                        @endforelse
                    </div>
                </div>
                {{ $employees->render() }}
            </div>
        </div>
    </div>
@endsection
