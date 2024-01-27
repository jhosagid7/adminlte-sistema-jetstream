<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        <div class="row">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input hidden type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                        x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                    {{--  <x-label for="photo" value="{{ __('Photo') }}" />  --}}

                    <!-- Current Profile Photo -->
                    <div class="block mt-2 mb-3 container w-50" x-show="! photoPreview">
                        <img object-fit="cover" max-width="50" max-height="50"
                            src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                            class="block img-circle img-thumbnail">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="col-4 mt-2 mb-3 container w-50" x-show="photoPreview" style="display: none;">
                        <img max-width="100%" alt="{{ $this->user->name }}" class="block img-circle img-thumbnail"
                            x-bind:src="photoPreview">
                    </div>

                    <x-adminlte-button class="btn-md" type="button" label="{{ __('Select A New Photo') }}"
                        theme="outline-info" icon="fas fa-md fa-image" x-on:click.prevent="$refs.photo.click()" />

                    @if ($this->user->profile_photo_path)
                        <x-adminlte-button class="btn-md" type="button" label="{{ __('Remove Photo') }}"
                            theme="outline-danger" icon="fas fa-md fa-image" wire:click="deleteProfilePhoto" />
                    @endif


                    <x-input-error for="photo" class="mt-2" />
                </div>
            @endif
        </div>


        <!-- Name -->
        <div class="row">
            <x-adminlte-input name="name" label="{{ __('Names') }}" placeholder="{{ __('Name') }}"
                wire:model="state.name" required autocomplete="name" fgroup-class="col-md-6 mt-3">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-user text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <!-- Email -->
        <div class="row">
            <x-adminlte-input name="email" label="{{ __('Email') }}" placeholder="{{ __('Email') }}"
                wire:model="state.email" required autocomplete="username" fgroup-class="col-md-6">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-envelope text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="row">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="row">

            <div class="col-1">
                <x-button wire:loading.attr="disabled" wire:target="photo">
                    {{ __('Save') }}

                </x-button>

            </div>
            <span>
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
            </span>
        </div>


    </x-slot>
</x-form-section>
