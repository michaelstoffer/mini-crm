@csrf

<input type="hidden" name="company_id" value="{{ $company->id }}" required />

<div class="form-group row mb-3">
    <label for="first_name" class="col-sm-2 col-form-label">First Name</label>

    <div class="col-sm-4">
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John" value="{{ $employee->first_name }}" autofocus required />
    </div>

    <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>

    <div class="col-sm-4">
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe" value="{{ $employee->last_name }}" required />
    </div>
</div>

<div class="form-group row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email</label>

    <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="info@example.com" value="{{ $employee->email }}" />
    </div>
</div>

<div class="form-group row mb-3">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" name="phone" placeholder="(555) 555-5555" value="{{ $employee->phone }}" />
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="button btn-primary rounded">{{ $buttonText }}</button>

        <a href="{{ $company->path() }}">Cancel</a>
    </div>
</div>

@include ('errors')
