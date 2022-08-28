<div class="card">
    <div class="card-body">

        <div class="card-title">
            {{ __('Profile Information') }}
            <p>
                {{ __('Update your account\'s profile information and email address.') }}
            </p>
        </div>

        <form name="form">
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="d-none"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif

            <div class="row">
                <!-- Name -->
            <div class="col-sm-6 sm:col-sm-4">
                <x-form.label for="name" value="{{ __('Name') }}" />
                <x-form.input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                <x-form.error for="name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-sm-6 sm:col-sm-4">
                <x-form.label for="email" value="{{ __('Email') }}" />
                <x-form.input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                <x-form.error for="email" class="mt-2" />

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                    <p class="text-sm mt-2">
                        {{ __('Your email address is unverified.') }}

                        <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                        <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                @endif
            </div>
            </div>
        </form>

        <div name="actions">
            <span class="mr-3" on="saved">
                {{ __('Saved.') }}
            </span>

            <button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</div>
