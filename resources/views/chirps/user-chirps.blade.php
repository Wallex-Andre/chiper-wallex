<x-layout>
    <x-slot:title>
        User Chirps
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">
            Your Chirps
            <span style="color: #5580d2;">{{ auth()->user()->name }}</span>
        </h1>

        <!-- Chirp Form -->
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">

                <form method="POST" action="/chirps" enctype="multipart/form-data">
                    @csrf

                    <!-- MESSAGE -->
                    <div class="form-control w-full">
                        <textarea
                            name="message"
                            id="chirperMessage"
                            placeholder="What's on your mind, {{ auth()->user()->name }}?"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            rows="4"
                            maxlength="255"
                        >{{ old('message') }}</textarea>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- MEDIA -->
                    <div class="mt-4 flex flex-col gap-3">

                        <!-- IMAGE -->
                        <input
                            type="file"
                            name="image"
                            accept="image/*"
                            class="file-input file-input-bordered w-full"
                            onchange="previewImage(event)"
                        />

                        <img id="preview-image" class="hidden w-32 rounded mt-2" />

                        <!-- AUDIO -->
                        <input
                            type="file"
                            name="audio"
                            accept="audio/*"
                            class="file-input file-input-bordered w-full"
                            onchange="previewAudio(event)"
                        />

                        <audio id="preview-audio" controls class="hidden mt-2"></audio>
                    </div>

                    <!-- BUTTON -->
                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Chirp
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <!-- FEED -->
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
                            <p class="mt-4 text-base-content/60">
                                You haven’t posted any chirps yet.
                            </p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</x-layout>