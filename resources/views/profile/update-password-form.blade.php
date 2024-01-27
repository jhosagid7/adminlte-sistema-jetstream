<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        {{--  <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password"
                autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>  --}}

        <x-adminlte-input name="current_password" label="{{ __('Current Password') }}"
            placeholder="{{ __('Current Password') }}" wire:model="state.current_password" autocomplete="current-password"
            fgroup-class="col-md-6 mt-3 mt-1 block w-full" type="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-unlock-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{--  <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('New Password') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password"
                autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>  --}}

        <x-adminlte-input name="password" label="{{ __('New Password') }}" placeholder="{{ __('New Password') }}"
            wire:model="state.password" autocomplete="new-password" fgroup-class="col-md-6 mt-3 mt-1 block w-full"
            type="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-lock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{--  <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full"
                wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>  --}}

        <x-adminlte-input name="password_confirmation" label="{{ __('Confirm Password') }}"
            placeholder="{{ __('Confirm Password') }}" wire:model="state.password_confirmation"
            autocomplete="new-password" fgroup-class="col-md-6 mt-3 mt-1 block w-full" type="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-lock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
