@props(['user'])

<div class="card bg-base-100">
    <div class="card-body">
        <div class="flex space-x-3">

            <div class="avatar">
                <div class="size-10 rounded-full">
                    <img src="https://avatars.laravel.cloud/{{ urlencode($user->email) }}?vibe=ocean"
                        alt="{{ $user->name }}'s avatar" class="rounded-full" />
                </div>
            </div>

            <p class="mt-1">{{ $user->name }}</p>
            <a href="{{ route('profile', $user) }}" class="btn btn-ghost btn-xs">
                View
            </a>
        </div>
    </div>
</div>