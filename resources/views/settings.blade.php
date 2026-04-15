<x-layout>
    <x-slot:title>Settings</x-slot:title>

    <div class="max-w-3xl mx-auto mt-10">
        <div class="bg-white p-6 rounded-xl shadow">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Settings</h2>
            </div>

            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                @csrf
                @method('PUT')


                <div class="flex items-center gap-4 mb-6">

                    <img id="avatarPreview" src="{{ $user->avatar
    ? asset('storage/' . $user->avatar)
    : 'https://avatars.laravel.cloud/' . urlencode($user->email) . '?vibe=ocean' }}"
                        class="w-14 h-14 rounded-full border border-gray-300 object-cover">

                    <div>
                        <label class="text-sm text-gray-600">Profile image</label>

                        <div class="flex items-center gap-2 mt-2">

                            <!-- UPLOAD -->
                            <label class="btn btn-outline btn-sm cursor-pointer">
                                Choose image
                                <input type="file" name="avatar" class="hidden" id="avatarInput">
                            </label>

                            <!-- REMOVE -->
                            @if($user->avatar)
                                <label class="flex h-8 items-center gap-2 text-sm btn bg-red-500 text-white cursor-pointer">
                                    <input type="checkbox" name="remove_avatar" value="1">
                                    Remove
                                </label>
                            @endif

                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('avatarInput').addEventListener('change', function () {
                        const file = this.files[0];

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function (e) {
                                document.getElementById('avatarPreview').src = e.target.result;
                            };

                            reader.readAsDataURL(file);
                        }
                    });
                </script>

                <!-- BASIC INFO -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm text-gray-600">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="input input-bordered w-full">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="input input-bordered w-full">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">CPF</label>
                        <input type="text" name="cpf" value="{{ old('cpf', $user->cpf) }}"
                            class="input input-bordered w-full">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Phone</label>
                        <input type="text" name="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}"
                            class="input input-bordered w-full">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm text-gray-600">Bio</label>
                        <textarea name="bio" class="input input-bordered w-full h-24 p-4"
                            placeholder="Write something about you...">{{ old('bio', $user->bio) }}</textarea>
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">City</label>
                        <input type="text" name="city" value="{{ old('city', $user->city) }}"
                            class="input input-bordered w-full">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">State</label>
                        <input type="text" name="state" value="{{ old('state', $user->state) }}"
                            class="input input-bordered w-full">
                    </div>

                </div>

                <!-- PASSWORD -->
                <div class="border-t pt-4 mt-4">
                    <h3 class="text-md font-semibold text-gray-700 mb-3">Change Password</h3>

                    <div class="space-y-3">
                        <input type="password" name="current_password" class="input input-bordered w-full"
                            placeholder="Current password" autocomplete="new-password">

                        <input type="password" name="password" class="input input-bordered w-full"
                            placeholder="New password" autocomplete="new-password">

                        <input type="password" name="password_confirmation" class="input input-bordered w-full"
                            placeholder="Confirm password" autocomplete="new-password">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layout>