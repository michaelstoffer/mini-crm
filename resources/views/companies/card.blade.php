<div class="card" style="width: 13rem;">
    <a href="{{ $company->path() }}">
        <img class="card-img-top" src="{{ asset($company->logo) }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text"><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></p>
            <p class="card-text"><a href="{{ $company->website }}">{{ $company->website }}</a></p>
        </div>
    </a>
</div>
