<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Edit Chirp</h1>

        <div class="card bg-base-100 mt-8">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="/chirps/{{ $chirp->id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <textarea name="message"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            rows="4" maxlength="255" required>{{ old('message', $chirp->message) }}</textarea>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        <!-- IMAGEM -->
                        <div class="mt-4">
                            <label class="label">
                                <span class="label-text">Image</span>
                            </label>

                            @if($chirp->image)
                                <img src="{{ asset('storage/' . $chirp->image) }}" class="w-32 mb-2 rounded"
                                    id="current-image">

                                <label class="cursor-pointer flex items-center gap-2 mt-2">
                                    <input type="checkbox" name="remove_image" class="checkbox checkbox-error">
                                    <span class="text-sm">Remove image</span>
                                </label>
                            @endif

                            <input type="file" name="image" accept="image/*"
                                class="file-input file-input-bordered w-full mt-2" onchange="previewImage(event)">

                            <img id="preview-image" class="hidden w-32 mt-2 rounded">
                        </div>

                        <!-- AUDIO -->
                        <div class="mt-4">
                            <label class="label">
                                <span class="label-text">Audio</span>
                            </label>

                            @if($chirp->audio)
                                <audio controls class="mb-2">
                                    <source src="{{ asset('storage/' . $chirp->audio) }}">
                                </audio>

                                <label class="cursor-pointer flex items-center gap-2 mt-2">
                                    <input type="checkbox" name="remove_audio" class="checkbox checkbox-error">
                                    <span class="text-sm">Remove audio</span>
                                </label>
                            @endif

                            <input type="file" name="audio" accept="audio/*"
                                class="file-input file-input-bordered w-full mt-2" onchange="previewAudio(event)">

                            <audio id="preview-audio" controls class="hidden mt-2"></audio>
                        </div>
                    </div>

                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn-ghost btn-sm">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>