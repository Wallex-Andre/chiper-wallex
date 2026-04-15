<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

@if (!auth()->check() || request()->get('about'))

<div class="min-h-screen w-full flex items-center justify-center text-white relative overflow-hidden"
     style="background: linear-gradient(135deg, #3f6fd1 0%, #5580d2 50%, #7aa0f2 100%);">

    <!-- Background decor -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-72 h-72 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-72 h-72 bg-white rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-4xl px-6 text-center">

        <!-- TITLE -->
        <h1 class="text-5xl font-bold tracking-tight mb-4">
            Chirper
        </h1>
        <p class="text-lg opacity-90 mb-10 max-w-2xl mx-auto">
            A modern, lightweight social platform designed for fast, clean and meaningful communication.
            Share thoughts instantly, explore users, and build your digital presence.
        </p>

        <!-- GRID CARDS -->
        <div class="grid md:grid-cols-3 gap-4 mb-10 text-left">

            <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/10">
                <h3 class="font-semibold mb-2">⚡ Fast Posting</h3>
                <p class="text-sm opacity-90">
                    Create and share chirps in seconds with a clean and distraction-free interface.
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/10">
                <h3 class="font-semibold mb-2">👤 Profiles</h3>
                <p class="text-sm opacity-90">
                    Customize your profile with avatar, bio and personal information.
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/10">
                <h3 class="font-semibold mb-2">🌐 Feed</h3>
                <p class="text-sm opacity-90">
                    Discover posts from other users in a clean, chronological timeline.
                </p>
            </div>

        </div>

        <!-- DESCRIPTION BOX -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/10 text-left mb-10">

            <h2 class="text-xl font-semibold mb-3">How Chirper works</h2>

            <p class="text-sm opacity-90 leading-relaxed">
                Chirper is built to be simple and fast.
                After creating an account, you can immediately start posting short messages called “chirps”.
                Each chirp appears in the global feed and on your profile, allowing others to interact and explore your content.
                The system is optimized for clarity, speed, and a smooth user experience.
            </p>

        </div>

        <!-- CTA -->
        <a href="{{ auth()->check() ? '/' : route('login') }}"
           class="bg-white text-[#5580d2] px-8 py-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition inline-block">

            {{ auth()->check() ? 'Enter Feed' : 'Start Now' }}

        </a>

        <p class="mt-4 text-sm opacity-80">
            Built for simplicity. Designed for expression.
        </p>

    </div>

</div>

@else

        <!-- HoME -->
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold mt-8">Latest Chirps</h1>

            <!-- Chirp Form -->
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <form method="POST" action="/chirps">
                        @csrf
                        <div class="form-control w-full">
                            <textarea name="message" placeholder="What's on your mind?"
                                class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                                rows="4" maxlength="255">{{ old('message') }}</textarea>

                            @error('message')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Chirp
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Feed -->
            <div class="space-y-4 mt-8">
                @forelse ($chirps as $chirp)
                    <x-chirp :chirp="$chirp" />
                @empty
                    <div class="hero py-12">
                        <div class="hero-content text-center">
                            <div>
                                <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                <p class="mt-4 text-base-content/60">No chirps yet. Be the first to chirp!</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    @endif
</x-layout>