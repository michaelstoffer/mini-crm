@csrf

<div class="form-group row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" name="name" placeholder="Company Name" value="{{ $company->name }}" autofocus required />
    </div>
</div>

<div class="form-group row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email</label>

    <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="info@example.com" value="{{ $company->email }}" />
    </div>
</div>

<div class="form-group row mb-3">
    <label for="website" class="col-sm-2 col-form-label">Website</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="website" name="website" placeholder="www.example.com" value="{{ $company->website }}" />
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="button btn-primary rounded">{{ $buttonText }}</button>

        <a href="{{ $company->path() }}">Cancel</a>
    </div>
</div>

@include ('errors')
