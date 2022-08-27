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

                        <div class=" col-sm-4">
                            <div class="text-sm-end">
                                <a href="{{ route('property.create') }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-plus me-1"></i> Add Property</a>
                            </div>
                        </div>
                    </div>

                    <div class='row'>

                        <div class='col-sm-12'>
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
                                            <th class="align-middle"> Name </th>
                                            <th class="align-middle"> Price </th>
                                            <th class="align-middle">Available</th>
                                            <th class="align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $key => $property)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" value="{{ $property->id() }}"
                                                        type="checkbox" id="{{ $property->id() }}"
                                                        wire:model="selectedRows">
                                                    <label class="form-check-label" for="{{ $property->id() }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript: void(0);" class="text-body fw-bold">{{ $key + 1
                                                    }}</a>
                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$property' field='title' :key='$key'/>
                                            </td>
                                            <td>
                                                <livewire:components.edit-title :model='$property' field='price' :key='$property->id()'/>

                                            </td>
                                            <td>
                                                <livewire:components.toggle-button :model='$property' field='status'
                                                    :key='$property->id()[$key]' />
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <a class="dropdown-item"
                                                            href="{{ route('property.show', $property) }}"><i
                                                                class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <a class="dropdown-item"
                                                            href="{{ route('property.edit', $property) }}"><i
                                                                class="fa fa-edit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $properties->links('pagination::custom-pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>