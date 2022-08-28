<x-app-layout>
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-xl-4">
            <x-card.details />
            
            <div class="card">
                <div class="card-header bg-transparent border-bottom">
                    <div class="d-flex justify-content-between flex-wrap align-items-start">
                        <div class="me-2">
                            <h5 class="card-title mt-1 mb-0">Gallery Images</h5>
                        </div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">Add New</button>
                    </div>
                    
                </div>
                
                <div class="card-body">

                    <div data-simplebar style="max-height: 295px;">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="post-recent" role="tabpanel">
                                <ul class="list-group list-group-flush">
                                    @foreach ($galleries as $gallery)
                                    <li class="list-group-item py-3">
                                        <div class="d-flex">
                                            <div class="me-3">
                                                <img src="{{ $gallery->image() }}" alt="" class="avatar-md h-auto d-block rounded">
                                            </div>
                                            
                                            <div class="align-self-center overflow-hidden me-auto">
                                                <div>
                                                    <livewire:components.edit-title :model='$gallery' field='title' :wire:key='$gallery->id()'/>
                                                    <p class="text-muted mb-0">{{ $gallery->createdAt() }}</p>
                                                </div>
                                            </div>

                                            <div class="dropdown ms-2">
                                                <livewire:components.toggle-button :model='$gallery' field='status'
                                                :wire:key='$gallery->id()' />
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <livewire:components.dashboard />
            <div class="card">
                <div class="card-body">
                    @writer
                    <livewire:components.domain.category />
                    @endwriter
                    @agent
                    <livewire:components.housing.category />
                    @endagent
                </div>
            </div>
        </div> <!-- end row -->
    </div>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Add image to gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                                <x-form.label for='title' value="{{ __('Title') }}" />
                                <x-form.input id='title' type="text" class="block w-full mt-1" :value="old('title')"
                                    name='title' />
                                <x-form.error for="title" />
                            </div>
                         
                            <div class="col-sm-12">
                                <x-form.input id='image' type="file" class="block w-full mt-1" :value="old('image')"
                                    name='image' />
                                <x-form.error for="image" />
                            </div>

                            <div class="col-sm-12 mt-2">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-secondary">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</x-app-layout>