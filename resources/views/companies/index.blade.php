@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center justify-content-between">Company's <a href="/companies/create" class="btn btn-link">New Company</a></div>

                    <div class="card-body d-flex flex-wrap justify-content-around">
                        @forelse ($companies as $company)
                            <div class="mb-3">
                                @include ('companies.card')
                            </div>
                        @empty
                            <div>No companies yet.</div>
                        @endforelse
                    </div>
                </div>
                {{ $companies->render() }}
            </div>
        </div>
    </div>
@endsection
