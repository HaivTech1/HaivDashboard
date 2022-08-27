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

                                <div class="col-lg-8">
                                    <div class="row">
                                        @if($search)
                                        <div class="col-6">
                                            <button wire:click.prevent="resetSearch" type=" button"
                                                class="btn btn-danger waves-effect btn-label waves-light">
                                                <i class="bx bx-block label-icon "></i>
                                                clear search
                                            </button>
                                        </div>
                                        @endif
                                        @if($selectedRows)
                                        <div class="col-6">
                                            <div class="btn-group btn-group-example mb-3" role="group">
                                                <button wire:click.prevent="deleteAll" type="button"
                                                    class="btn btn-outline-primary w-sm">
                                                    <i class="bx bx-block"></i>
                                                    Delete All
                                                </button>
                                                <button wire:click.prevent="disableAll" type="button"
                                                    class="btn btn-outline-primary w-sm">
                                                    <i class="bx bx-check-double"></i>
                                                    Disable All
                                                </button>
                                                <button wire:click.prevent="undisableAll" type="button"
                                                    class="btn btn-outline-primary w-sm">
                                                    <i class="bx bx-x-circle"></i>
                                                    Undisable All
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </diV>
                            </div>
                        </div>

                        <div class=" col-sm-4">
                            <div class="text-sm-end">
                                <button href="{{ route('user.create') }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i
                                        class="mdi mdi-plus me-1"></i> Add User</button>
                            </div>
                        </div><!-- end col-->
                    </div>

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
                                    <th class="align-middle"></th>
                                    <th class="align-middle">User Name</th>
                                    <th class="align-middle">User email</th>
                                    <th class="align-middle">Account Status</th>
                                    <th class="align-middle">User Status</th>
                                    <th></th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" value="{{ $user->id() }}" type="checkbox"
                                                id="{{ $user->id() }}" wire:model="selectedRows">
                                            <label class="form-check-label" for="{{ $user->id() }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <img class="rounded-circle avatar-xs"
                                                src="{{ $user->image() ? $user->image() : '/favicon.ico' }}" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <livewire:components.edit-title :model='$user' field='name' :wire:key='$user->id()'/>
                                    </td>
                                    <td>
                                        <livewire:components.edit-title :model='$user' field='email' :wire:key='$user->id()'/>
                                    </td>
                                    <td>

                                        @if ($user->email_verified_at === null )
                                        <span class="badge badge-pill badge-soft-danger font-size-12">Not
                                            verified</span>
                                        @else
                                        <span class="badge badge-pill badge-soft-success font-size-12">Verified</span>
                                        @endif

                                    </td>
                                    <td>

                                        @if ($user->available_badge == 'Not Available' )
                                        <span class="badge badge-pill badge-soft-danger font-size-12">
                                            {{ $user->available_badge }}</span>
                                        @else
                                        <span class="badge badge-pill badge-soft-success font-size-12">
                                            {{ $user->available_badge }}</span>
                                        @endif

                                    </td>
                                   
                                    <td>
                                        <div class="px-2 py-1 text-center text-gray-700 bg-green-200 rounded">
                                            <select wire:change="changeUser({{$user}}, $event.target.value)"
                                                class="form-control w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                <option value="1" @if($user->type() === 1) selected @endif>Admin
                                                </option>
                                                <option value="2" @if($user->type() === 2) selected @endif>Manager
                                                </option>
                                                <option value="3" @if($user->type() === 3) selected @endif>Writer
                                                </option>
                                                <option value="4" @if($user->type() === 4) selected @endif>Agent
                                                </option>
                                                <option value="5" @if($user->type() === 5) selected @endif>Default
                                                </option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <livewire:components.toggle-button :model='$user' field='status'
                                                    :wire:key='$user->id()' />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links('pagination::custom-pagination')}}
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Create a new user</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form wire:submit.prevent="createUser" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <x-form.label for="name" value="{{ __('Name') }}" />
                                <x-form.input id="name" class="block w-full mt-1" type="text" wire:model.defer="state.name"
                                    id="name" placeholder="Name" :value="old('name')" />
                                <x-form.error for="name" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <x-form.label for="email" value="{{ __('Email') }}" />
                                <x-form.input id="email" class="block w-full mt-1" type="email" wire:model.defer="state.email"
                                    id="email" placeholder="Email" :value="old('email')" />
                                <x-form.error for="email" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <x-form.label for="password" value="{{ __('Password') }}" />
                                <input type="password" class="form-control" id="userpassword"
                                    placeholder="Enter password" wire:model.defer="state.password" required>
                                <div class="invalid-feedback">
                                    Please Enter Password
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <x-form.label for="type" value="{{ __('Type') }}" />
                                <select wire:model.defer="state.type"
                                    class="form-control w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="1">Admin
                                    </option>
                                    <option value="2">Manager
                                    </option>
                                    <option value="3">Writer
                                    </option>
                                    <option value="4">Agent
                                    </option>
                                    <option value="5">Default
                                    </option>
                                </select>
                                <x-form.error for="type" />
                            </div>
                        </div>

                    </div>

                </div>

                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary block waves-effect waves-light pull-right">Save
                        User</button>
                </div>
            </form>
        </div>
    </div>
</div>