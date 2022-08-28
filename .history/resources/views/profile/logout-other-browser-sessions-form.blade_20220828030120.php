<div class="card">
    <div class="card-body">
        <div class="card-title">
            {{ __('Browser Sessions') }}
        </div>
    
        <p name="description">
            {{ __('Manage and log out your active sessions on other browsers and devices.') }}
        </p>

        <div name="content">
            <div class="max-w-xl text-sm text-gray-600">
                {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
            </div>
    
            @if (count($this->sessions) > 0)
                <div class="mt-5 space-y-6">
                    <!-- Other Browser Sessions -->
                    @foreach ($this->sessions as $session)
                        <div class="flex items-center">
                            <div>
                                @if ($session->agent->isDesktop())
                                    <i class="fa fa-desktop"></i>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                        <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                    </svg>
                                @endif
                            </div>
    
                            <div class="ml-3">
                                <div class="text-sm text-gray-600">
                                    {{ $session->agent->platform() ? $session->agent->platform() : 'Unknown' }} - {{ $session->agent->browser() ? $session->agent->browser() : 'Unknown' }}
                                </div>
    
                                <div>
                                    <div class="text-xs text-gray-500">
                                        {{ $session->ip_address }},
    
                                        @if ($session->is_current_device)
                                            <span class="text-green-500 font-semibold">{{ __('This device') }}</span>
                                        @else
                                            {{ __('Last active') }} {{ $session->last_active }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
    
            <div class="flex items-center mt-5">
                <x-jet-button wire:click="confirmLogout" wire:loading.attr="disabled">
                    {{ __('Log Out Other Browser Sessions') }}
                </x-jet-button>
    
                <x-jet-action-message class="ml-3" on="loggedOut">
                    {{ __('Done.') }}
                </x-jet-action-message>
            </div>
    
            <!-- Log Out Other Devices Confirmation Modal -->
            <x-jet-dialog-modal wire:model="confirmingLogout">
                <x-slot name="title">
                    {{ __('Log Out Other Browser Sessions') }}
                </x-slot>
    
                <x-slot name="content">
                    {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
    
                    <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-jet-input type="password" class="mt-1 block w-3/4"
                                    placeholder="{{ __('Password') }}"
                                    x-ref="password"
                                    wire:model.defer="password"
                                    wire:keydown.enter="logoutOtherBrowserSessions" />
    
                        <x-jet-input-error for="password" class="mt-2" />
                    </div>
                </x-slot>
    
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>
    
                    <x-jet-button class="ml-3"
                                wire:click="logoutOtherBrowserSessions"
                                wire:loading.attr="disabled">
                        {{ __('Log Out Other Browser Sessions') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-dialog-modal>
        </div>
    </div>

   
</div>
