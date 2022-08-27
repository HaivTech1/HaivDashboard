<div>
    <x-loading />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-lg-4">
                                    <x-search />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='row'>

                        <div class='col-sm-8'>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;" class="align-middle">
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        wire:model="selectPageRows">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle">#</th>
                                            <th class="align-middle"> User </th>
                                            <th class="align-middle"> Linkedin </th>
                                            <th class="align-middle"> Facebook </th>
                                            <th class="align-middle">Instagram</th>
                                            <th class="align-middle">Twitter</th>
                                            <th class="align-middle">Designation</th>
                                            <th class="align-middle">Available</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pioneers as $key => $pioneer)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" value="{{ $pioneer->id() }}"
                                                        type="checkbox" id="{{ $pioneer->id() }}"
                                                        wire:model="selectedRows">
                                                    <label class="form-check-label" for="{{ $pioneer->id() }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript: void(0);" class="text-body fw-bold">{{ $key + 1
                                                    }}</a>
                                            </td>
                                            <td>
                                                {{ $pioneer->author()->name() }}
                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$pioneer' field='linkedin' :wire:key='$pioneer->id()'/>

                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$pioneer' field='facebook' :wire:key='$pioneer->id()'/>

                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$pioneer' field='instagram' :wire:key='$pioneer->id()'/>

                                            </td>

                                            <td>
                                                <livewire:components.edit-title :model='$pioneer' field='twitter' :wire:key='$pioneer->id()'/>

                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$pioneer' field='designation' :wire:key='$pioneer->id()'/>

                                            </td>
                                            <td>
                                                <livewire:components.toggle-button :model='$pioneer' field='status'
                                                    :wire:key='$pioneer->id()' />
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $pioneers->links('pagination::custom-pagination') }}
                        </div>
                        <div class="col-sm-4">
                            <form wire:submit.prevent='createPioneer'>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <x-form.label for='facebook' value="{{ __('Facebook') }}" />
                                        <x-form.input id='facebook' class="block w-full mt-1" :value="old('facebook')"
                                            wire:model.defer='pioneer.facebook' />
                                        <x-form.error for="facebook" />
                                    </div>
                                    <div class="col-sm-6">
                                        <x-form.label for='instagram' value="{{ __('Instagram') }}" />
                                        <x-form.input id='instagram' class="block w-full mt-1" :value="old('instagram')"
                                            wire:model.defer='pioneer.instagram' />
                                        <x-form.error for="instagram" />
                                    </div>
                                    <div class="col-sm-6">
                                        <x-form.label for='twitter' value="{{ __('Twitter') }}" />
                                        <x-form.input id='twitter' class="block w-full mt-1" :value="old('twitter')"
                                            wire:model.defer='pioneer.twitter' />
                                        <x-form.error for="twitter" />
                                    </div>
                                    <div class="col-sm-6">
                                        <x-form.label for='linkedin' value="{{ __('Linkedin') }}" />
                                        <x-form.input id='linkedin' class="block w-full mt-1" :value="old('linkedin')"
                                            wire:model.defer='pioneer.linkedin' />
                                        <x-form.error for="linkedin" />
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <x-form.label for="author_id" value="{{ __('User') }}" />
                                        <select class="form-control" wire:model.defer="pioneer.author_id">
                                            <option>Select</option>
                                            @foreach ($users as $id => $user)
                                            <option value="{{ $id }}">{{ $user }}</option>
                                            @endforeach
                                        </select>
                                        <x-form.error for="author_id" />
                                    </div>

                                    <div class="col-sm-12 mt-2">
                                        <label>Designation</label>
                                        <div class="o-features">
                                            <ul class="ul-list third-row" style="list-style-type: none">
                                                <li>
                                                    <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                                        <input class="form-check-input" type="checkbox" id="designation" wire:model.defer="pioneer.designation" value="Chairman">
                                                        <label class="form-check-label" for="designation">
                                                            Chairman
                                                        </label>
                                                    </div>
            
                                                </li>
            
                                                <li>
                                                    <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                                        <input class="form-check-input" type="checkbox" id="designation" wire:model.defer="pioneer.designation" value="Chief Executice Officer">
                                                        <label class="form-check-label" for="designation">
                                                            Chief Executice Officer
                                                        </label>
                                                    </div>
                                                </li>
            
                                                <li>
                                                    <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                                        <input class="form-check-input" type="checkbox" id="designation" wire:model.defer="pioneer.designation" value="Chief Relation Officer">
                                                        <label class="form-check-label" for="designation">
                                                            Chief Relation Officer
                                                        </label>
                                                    </div>
                                                </li>
            
                                                <li>
                                                    <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                                        <input class="form-check-input" type="checkbox" id="designation" wire:model.defer="pioneer.designation" value="Chief Marketing Officer">
                                                        <label class="form-check-label" for="designation">
                                                            Chief Marketing Officer
                                                        </label>
                                                    </div>
                                                </li>
            
                                                <li>
                                                    <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                                        <input class="form-check-input" type="checkbox" id="designation"
                                                            wire:model.defer="pioneer.designation" value="Chief Sales Officer">
                                                        <label class="form-check-label" for="designation">
                                                            Chief Sales Officer
                                                        </label>
                                                    </div>
                                                </li>
            
                                                <li>
                                                    <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                                        <input class="form-check-input" type="checkbox" id="designation" wire:model.defer="pioneer.designation" value="Staff">
                                                        <label class="form-check-label" for="designation">
                                                            Staff
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mt-2">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-secondary">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>