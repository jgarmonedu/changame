<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-form.input-label for="name" :value="__('Name')" />
            <x-form.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-form.input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-form.input-label for="email" :value="__('Email')" />
            <x-form.text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-form.input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div class="flex gap-2">
            <div class="w-1/2">
                <x-form.input-label for="phone_number" :value="__('Phone number')" />
                <x-form.text-input id="phone_number" name="phone_number" type="tel" class="mt-1 block w-full" :value="old('phone_number', $user->phone_number)" autofocus autocomplete="phone_number" pattern="/^(\+\d{1,3}[- ]?)?\d{9}$/"/>
                <x-form.input-error class="mt-2" :messages="$errors->get('phone_number')" />
            </div>
            <div class="w-1/2">
                <x-form.input-label for="date_of_birth" :value="__('Date of birth')" />
                <x-form.text-input data-provide="datepicker" id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $user->date_of_birth)" autofocus autocomplete="date_of_birth" />
                <x-form.input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
            </div>
        </div>
        <div>
            <x-form.input-label for="country" :value="__('Country')" />
            <select id="country" name="country" class="mt-1 block w-full border-gray-300 focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm" :value="old('country', $user->country)"  autofocus autocomplete="country">
                <option value=' '>{{__('Select country...')}}</option>
            </select>
            <x-form.input-error class="mt-2" :messages="$errors->get('country')" />
        </div>
        <div>
            <x-form.input-label for="state" :value="__('Region')" />
            <x-form.text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $user->state)"  autofocus autocomplete="state" />
            <x-form.input-error class="mt-2" :messages="$errors->get('state')" />
        </div>
        <div>
            <x-form.input-label for="city" :value="__('City')" />
            <x-form.text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)"  autofocus autocomplete="city" />
            <x-form.input-error class="mt-2" :messages="$errors->get('city')" />
        </div>
        <div class="flex gap-2">
            <div class="w-3/4">
                <x-form.input-label for="address" :value="__('Address')" />
                <x-form.text-input id="address" name="phone_number" type="tel" class="mt-1 block w-full" :value="old('address', $user->address)" autofocus autocomplete="address" />
                <x-form.input-error class="mt-2" :messages="$errors->get('address')" />
            </div>
            <div class="w-1/4">
                <x-form.input-label for="postal_code" :value="__('Postal Code')" />
                <x-form.text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', $user->postal_code)" autofocus autocomplete="postal_code" pattern="/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/"/>
                <x-form.input-error class="mt-2" :messages="$errors->get('postal_code')" />
            </div>
        </div>
        <div>
            <x-form.input-label for="photo" :value="__('Photo')" />
            @if ($user->photo)
                <div class="w-25 py-8">
                    <img class="rounded-full shadow-md" src="{{ asset('storage/' .  $user->photo) }}">
                </div>
            @endif
            <input type="file" class="form-input-file" id="photo" name="photo" accept="image/*"/>
            <x-form.input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-form.primary-button>{{ __('Save') }}</x-form.primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
