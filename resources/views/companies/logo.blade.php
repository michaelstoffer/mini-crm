@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">Upload Company Logo</div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ $company->path() }}/logo"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <div class="field">
                                <div class="control">
                                    Select image to upload:
                                    <input type="file" name="logo" id="logo" accept=".jpg, .jpeg, .png">
                                    <p class="mt-3">
                                        <button type="submit" class="button btn-primary rounded">Upload Image</button>
                                        <a href="{{ $company->path() }}">Cancel</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
