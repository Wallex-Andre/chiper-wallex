<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    @if (!auth()->check() || request()->get('about'))

        <div class="min-h-screen bg-base-200 flex items-center justify-center px-6 py-20">

            <div class="max-w-5xl w-full space-y-10">

                <!-- HEADER -->
                <div class="text-center space-y-4">
                    <h1 class="text-5xl font-bold">Chirper</h1>

                    <p class="text-base-content/70 text-lg max-w-2xl mx-auto">
                        A functional academic project designed to demonstrate backend development concepts,
                        authentication systems, and data management using a modern PHP framework.
                    </p>

                    <div class="flex justify-center gap-3 flex-wrap mt-4">
                        <a href="https://chirper-main-wallex.free.laravel.cloud/" target="_blank"
                            class="btn btn-primary text-white">
                            Live Version
                        </a>

                        <a href="https://github.com/Wallex-Andre" target="_blank"
                            class="btn btn-outline text-white border-white hover:bg-white hover:text-black">
                            Source Code
                        </a>
                    </div>
                </div>

                <!-- ABOUT ME -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body flex flex-col md:flex-row gap-6 items-center">

                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-base-300">
                            <img src="{{ asset('images/profile.jpg') }}" class="w-full h-full object-cover">
                        </div>

                        <div>
                            <h2 class="text-2xl font-bold">About Me</h2>

                            <p class="text-base-content/70 mt-2 leading-relaxed">
                                My name is <strong>Wallex</strong>, and I am a Software Development student focused on
                                learning system architecture, programming logic, and database concepts.
                            </p>

                            <p class="text-base-content/70 mt-2 leading-relaxed">
                                This project was developed during a learning program based on the Laravel Bootcamp,
                                where I practiced backend concepts and extended the project with additional features.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CARDS -->
                <div class="grid md:grid-cols-3 gap-6">

                    <div class="card bg-base-100 shadow hover:scale-105 transition">
                        <div class="card-body">
                            <h3 class="font-bold text-lg">Learning Process</h3>
                            <p class="text-sm text-base-content/70">
                                Developed as part of an academic training process focused on backend development.
                            </p>
                        </div>
                    </div>

                    <div class="card bg-base-100 shadow hover:scale-105 transition">
                        <div class="card-body">
                            <h3 class="font-bold text-lg">Core Concepts</h3>
                            <p class="text-sm text-base-content/70">
                                Covers authentication, CRUD operations, validation, and data relationships.
                            </p>
                        </div>
                    </div>

                    <div class="card bg-base-100 shadow hover:scale-105 transition">
                        <div class="card-body">
                            <h3 class="font-bold text-lg">System Design</h3>
                            <p class="text-sm text-base-content/70">
                                Structured using MVC architecture and relational database modeling.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- PROJECT DETAILS -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body space-y-4">

                        <h2 class="text-2xl font-bold">Project Overview</h2>

                        <p class="text-base-content/70 leading-relaxed">
                            This system allows users to create, edit, and manage content entries with support for
                            text and media attachments. It also includes authentication, profile management, and
                            search functionality.
                        </p>

                        <div class="grid md:grid-cols-2 gap-6 text-sm">

                            <div>
                                <h3 class="font-semibold mb-2">Main Features</h3>
                                <ul class="list-disc ml-5 text-base-content/70 space-y-1">
                                    <li>Create, edit, and delete posts</li>
                                    <li>Global content feed</li>
                                    <li>Media upload (images and audio)</li>
                                    <li>Preview before submission</li>
                                    <li>Remove or replace media in edit mode</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="font-semibold mb-2">User Management</h3>
                                <ul class="list-disc ml-5 text-base-content/70 space-y-1">
                                    <li>User registration and login</li>
                                    <li>Profile editing</li>
                                    <li>Profile image upload</li>
                                    <li>View other user profiles</li>
                                    <li>Filter content by user</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="font-semibold mb-2">Search System</h3>
                                <ul class="list-disc ml-5 text-base-content/70 space-y-1">
                                    <li>Search by text content</li>
                                    <li>Search users by name</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="font-semibold mb-2">Security & Validation</h3>
                                <ul class="list-disc ml-5 text-base-content/70 space-y-1">
                                    <li>Authorization policies</li>
                                    <li>Input validation rules</li>
                                    <li>File upload validation</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- TECH -->
                <div class="text-center">
                    <h2 class="text-xl font-bold mb-4">Technologies</h2>
                    <div class="flex justify-center flex-wrap gap-2">
                        <span class="badge badge-outline">PHP</span>
                        <span class="badge badge-outline">Laravel</span>
                        <span class="badge badge-outline">MySQL</span>
                        <span class="badge badge-outline">HTML</span>
                        <span class="badge badge-outline">CSS</span>
                        <span class="badge badge-outline">JavaScript</span>
                    </div>
                </div>
                <div class="mt-10 flex flex-col sm:flex-row gap-3 justify-center">

                    @auth
                        <a href="{{ url('/') }}"
                            class="btn btn-primary btn-wide text-white font-semibold shadow-lg hover:scale-105 transition">
                            Go to Feed
                        </a>
                    @else
                        <a href="{{ url('/') }}" class="btn btn-outline btn-primary btn-wide">
                            Explore Feed
                        </a>

                        <a href="{{ route('login') }}" class="btn btn-outline btn-primary btn-wide">
                            Sign In
                        </a>

                        <a href="{{ route('register') }}"
                            class="btn btn-primary btn-wide text-white font-semibold shadow-lg hover:scale-105 transition">
                            Register
                        </a>
                    @endauth

                </div>
            </div>
        </div>

    @else

        <!-- HoME -->
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold mt-8">Latest Chirps</h1>

            <!-- Chirp Form -->
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/chirps">

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
                            <div class="mt-2 m-2">
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Image</span>
                                    </div>
                                    <input type="file" name="image" accept="image/*"
                                        class="file-input file-input-bordered w-full" />
                                </label>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Audio</span>
                                    </div>
                                    <input type="file" name="audio" accept="audio/*"
                                        class="file-input file-input-bordered w-full" />
                                </label>

                                <img id="preview-image" class="hidden w-32 mt-2 rounded">
                                <audio id="preview-audio" controls class="hidden mt-2"></audio>
                            </div>
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