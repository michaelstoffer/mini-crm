<div class="card" style="width: 20rem;">
    <a href="{{ $user->path() }}">
        <div class="card-body">
            <h5 class="card-title m-0">
                {{ $user->name }}
                @foreach ($user->roles as $role)
                    ({{ $role->name }})
                @endforeach
            </h5>

            <p class="card-text"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
        </div>
    </a>
</div>
