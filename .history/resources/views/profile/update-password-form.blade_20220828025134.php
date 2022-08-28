<div class="card">
    <div class="card-body">
        <h2>{{ __('Update Password') }}</h2>

        <p>
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

        <form name="form">
            <div class="row">
                <div class="col-sm-4 sm:col-sm-4">
                    <x-form.label for="current_password" value="{{ __('Current Password') }}" />
                    <x-form.input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                    <x-form.error for="current_password" class="mt-2" />
                </div>
        
                <div class="col-sm-4 sm:col-sm-4">
                    <x-form.label for="password" value="{{ __('New Password') }}" />
                    <x-form.input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                    <x-form.error for="password" class="mt-2" />
                </div>
        
                <div class="col-sm-4 sm:col-sm-4">
                    <x-form.label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-form.input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                    <x-form.error for="password_confirmation" class="mt-2" />
                </div>
            </div>
        </form>
    
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
    
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </div>
</div>
