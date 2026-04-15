<x-layout>
    <x-slot:title>Profile</x-slot:title>
    <div>
        <div class="lg:w-8/12 lg:mx-auto mb-8">

            <div class="bg-linear-to-r from-blue-40 to-white rounded-xl p-6 shadow-sm">

                <div class="flex flex-col md:flex-row items-center gap-6">

                    <!-- AVATAR -->
                    <div class="relative">
                        <img class="w-28 h-28 object-cover rounded-full border-4 border-white shadow-md"
                            src="https://avatars.laravel.cloud/{{ urlencode($user->email) }}?vibe=ocean" alt="profile">
                    </div>

                    <!-- INFO -->
                    <div class="flex-1 text-center md:text-left">

                        <!-- NAME -->
                        <h2 class="text-3xl font-bold text-gray-800">
                            {{ $user->name }}
                        </h2>

                        <!-- EXTRA INFO -->
                        <div class="mt-3 text-sm text-gray-500 space-y-1">
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->country }}</p>
                        </div>

                    </div>

                    <!-- RIGHT SIDE (BUTTON + STATS) -->
                    <div class="flex flex-col items-center md:items-end gap-4">

                        @if(auth()->id() === $user->id)
                            <a href="{{ route('settings') }}" class="btn btn-primary btn-sm rounded-full">
                                Edit profile
                            </a>
                        @endif

                        <!-- STATS -->
                        <div class="text-sm text-gray-600 text-center md:text-right space-y-1">
                            <div>
                                <strong class="text-gray-800">{{ $chirpsCount }}</strong> Chirps
                            </div>

                            <div>
                                @if($chirps->isNotEmpty())
                                     Last chirp: {{ $chirps->first()->created_at->diffForHumans() }}
                                @else
                                    No chirps yet
                                @endif
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 px-2 mt-8">
                @if(auth()->id() === $user->id)
                    <h1
                        class="btn btn-primary btn-sm rounded-full flex items-center gap-4 pointer-events-none cursor-default">
                        Your Chirps
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </h1>

                    <a href="{{ route('user-chirps') }}?focar=true"
                        class="btn btn-primary btn-sm rounded-full flex items-center gap-4">
                        Add more chirps
                    </a>
                @else
                    <h1 class="text-2xl font-bold mt-8 align"><span style="color: #5580d2;">{{ $user->name }}</span> chirps
                    </h1>
                @endif
            </div>
            <!-- POSTS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 px-2 mt-8">

                @forelse ($chirps as $chirp)
                    <x-chirp :chirp="$chirp" />
                @empty
                    <div class="col-span-1 md:col-span-2 hero py-12">
                        <div class="hero-content text-center">
                            <div class="max-w-md">
                                <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                <p class="mt-4 text-base-content/60 font-medium">You haven’t posted any chirps yet!</p>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>

        </div>
    </div>
</x-layout>