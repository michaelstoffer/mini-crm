<div class="card" style="width: 13rem;">
    <a href="{{ $employee->path() }}">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
            <p class="card-text"><a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></p>
            <p class="card-text"><a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></p>
        </div>
    </a>
</div>
