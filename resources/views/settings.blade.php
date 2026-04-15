<x-layout>
    <x-slot:title>Settings</x-slot:title>

    <div class="max-w-3xl mx-auto mt-10">
        <div class="bg-white p-6 rounded-xl shadow">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Settings</h2>

                <img src="https://avatars.laravel.cloud/{{ urlencode($user->email) }}?vibe=ocean"
                    class="w-14 h-14 rounded-full border border-gray-300">
            </div>

            <form action="{{ route('settings.update') }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')

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
<input type="password" name="current_password"
    class="input input-bordered w-full"
    placeholder="Current password"
    autocomplete="new-password">

<input type="password" name="password"
    class="input input-bordered w-full"
    placeholder="New password"
    autocomplete="new-password">

<input type="password" name="password_confirmation"
    class="input input-bordered w-full"
    placeholder="Confirm password"
    autocomplete="new-password">
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