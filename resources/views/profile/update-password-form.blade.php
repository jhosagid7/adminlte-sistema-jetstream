<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">


        <x-adminlte-input name="current_password" label="{{ __('Current Password') }}"
            placeholder="{{ __('Current Password') }}" wire:model="state.current_password" autocomplete="current-password"
            fgroup-class="col-md-6 mt-3 mt-1 block w-full" type="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-unlock-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>



        <x-adminlte-input name="password" label="{{ __('New Password') }}" placeholder="{{ __('New Password') }}"
            wire:model="state.password" autocomplete="new-password" fgroup-class="col-md-6 mt-3 mt-1 block w-full"
            type="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-lock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>



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
