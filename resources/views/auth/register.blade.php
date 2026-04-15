<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-xl mt-1 font-bold text-center mb-6">Create Account</h1>

                    <form method="POST" action="/register">
                        @csrf

                        <!-- Name -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="name"
                                   placeholder="John Doe"
                                   value="{{ old('name') }}"
                                   class="input input-bordered @error('name') input-error @enderror"
                                   required>
                            <span>Name</span>
                        </label>
                        @error('name')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Email -->
                        <label class="floating-label mb-6">
                            <input type="email"
                                   name="email"
                                   placeholder="mail@example.com"
                                   value="{{ old('email') }}"
                                   class="input input-bordered @error('email') input-error @enderror"
                                   required>
                            <span>Email</span>
                        </label>
                        @error('email')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Password -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password"
                                   placeholder="••••••••"
                                   class="input input-bordered @error('password') input-error @enderror"
                                   required>
                            <span>Password</span>
                        </label>
                        @error('password')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Password Confirmation -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password_confirmation"
                                   placeholder="••••••••"
                                   class="input input-bordered"
                                   required>
                            <span>Confirm Password</span>
                        </label>

                        <!-- More field -->

                        <!-- CPF -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="cpf"
                                   placeholder="123.456.789-00"
                                   value="{{ old('cpf') }}"
                                   class="input input-bordered @error('cpf') input-error @enderror">
                            <span>CPF</span>
                        </label>
                        @error('cpf')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                        <!-- Phone Number -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="phonenumber"
                                   placeholder="(12) 34567-8901"
                                   value="{{ old('phonenumber') }}"
                                   class="input input-bordered @error('phonenumber') input-error @enderror">
                            <span>Phone Number</span>
                        </label>
                        @error('phonenumber')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Birth Date -->
                        <label class="floating-label mb-6">
                            <input type="date"
                                   name="birth_date"
                                   value="{{ old('birth_date') }}"
                                   class="input input-bordered @error('birth_date') input-error @enderror">
                            <span>Birth Date</span>
                        </label>
                        @error('birth_date')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Country -->
                        <label class="floating-label mb-6"> 
                            <input type="text"
                                   name="country"
                                   placeholder="Country"
                                   value="{{ old('country') }}"
                                   class="input input-bordered @error('country') input-error @enderror">
                            <span>Country</span>
                        </label>
                        @error('country')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Zip Code -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="zip_code"
                                   placeholder="12345-678"
                                   value="{{ old('zip_code') }}"
                                   class="input input-bordered @error('zip_code') input-error @enderror">
                            <span>Zip Code</span>
                        </label>
                        @error('zip_code')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Street -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="street"
                                   placeholder="Street Name"
                                   value="{{ old('street') }}"
                                   class="input input-bordered @error('street') input-error @enderror">
                            <span>Street</span>
                        </label>
                        @error('street')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Number -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="number"
                                   placeholder="123"
                                   value="{{ old('number') }}"
                                   class="input input-bordered @error('number') input-error @enderror">
                            <span>Number</span>
                        </label>
                        @error('number')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Complement -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="complement"
                                   placeholder="Apartment, suite, etc."
                                   value="{{ old('complement') }}"
                                   class="input input-bordered @error('complement') input-error @enderror">
                            <span>Complement</span>
                        </label>
                        @error('complement')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Neighborhood -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="neighborhood"
                                   placeholder="Neighborhood"
                                   value="{{ old('neighborhood') }}"
                                   class="input input-bordered @error('neighborhood') input-error @enderror">
                            <span>Neighborhood</span>
                        </label>
                        @error('neighborhood')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- City -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="city"
                                   placeholder="City"
                                   value="{{ old('city') }}"
                                   class="input input-bordered @error('city') input-error @enderror">
                            <span>City</span>
                        </label>
                        @error('city')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div> 
                        @enderror

                        <!-- State -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="state"
                                   placeholder="State"
                                   value="{{ old('state') }}"
                                   class="input input-bordered @error('state') input-error @enderror">
                            <span>State</span>
                        </label>
                        @error('state')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" class="btn btn-primary btn-sm w-full">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Already have an account?
                        <a href="/login" class="link link-primary">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>