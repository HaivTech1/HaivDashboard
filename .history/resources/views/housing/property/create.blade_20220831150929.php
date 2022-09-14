<x-app-layout>
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Property</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Basic Information</h4>
                    <p class="card-title-desc">Fill all information below</p>

                    <form id="createProperty" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3 mb-3">
                                <x-form.label for="title" value="{{ __('Property Title') }}" />
                                <x-form.input id="title" class="block w-full mt-1" type="text" name="title"
                                    :value="old('title')" id="title" placeholder="Property Name" autofocus />
                                <x-form.error for="title" />
                            </div>

                            <div class="col-sm-3 mb-3">
                                <x-form.label for="built" value="{{ __('Property built') }}" />
                                <x-form.input id="built" class="block w-full mt-1" type="date" name="built"
                                    id="built" autofocus />
                                <x-form.error for="built" />
                            </div>

                            <div class="col-sm-3 mb-3">
                                <x-form.label for="price" value="{{ __('Property price') }}" />
                                <x-form.input class="block w-full mt-1" placeholder="{{ trans('global.naira') }}"
                                    type="text" name="price" :value="old('price')" autofocus />
                                <x-form.error for="price" />
                            </div>

                            <div class="col-sm-3 mb-3">
                                <x-form.label for="purpose" value="{{ __('purpose') }}" />
                                <select class="form-control select2" name="purpose" :value="old('purpose')">
                                    <option value="">Select</option>
                                    <option value="rent">For rent</option>
                                    <option value="sale">For Sale</option>
                                </select>
                            </div>


                            <div class="col-sm-3 mb-3">
                                <x-form.label for="bedroom" value="{{ __('Bedroom') }}" />
                                <x-form.input id="bedroom" class="block w-full mt-1" placeholder="bedroom"
                                type="number" name="bedroom" :value="old('bedroom')" autofocus />
                            </div>

                            <div class="col-sm-3 mb-3">
                                <x-form.label for="bathroom" value="{{ __('Bathroom') }}" />
                                <x-form.input id="bathroom" class="block w-full mt-1" placeholder="bathroom"
                                type="number" name="bathroom" :value="old('bathroom')" autofocus />
                            </div>

                            <div class="col-sm-3 mb-3">
                                <x-form.label for="Category" value="{{ __('Property Category') }}" />
                                <select class="form-control" name="category">
                                    <option>Select</option>
                                    @foreach ($categories as $id => $category)
                                    <option value="{{ $id }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <x-form.label for="productdesc" value="{{ __('Property Description') }}" />
                                <textarea class="form-control" id="productdesc" rows="5" name="description"
                                    value="old('description')" placeholder="Property Description"></textarea>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <x-form.label for="specifications" value="{{ __('Property Specifications') }}" /> <span class="text-danger">separate with comma(,)</span>
                                <textarea class="form-control" id="specifications" rows="5" name="specifications"
                                    value="old('specifications')" placeholder="Property specifications"></textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <h3>Location</h3>

                            <div class="row">
                                
                            </div>

                        </div>

                        <div class="row mt-3">
                            <h3>Media</h3>

                            <div class="col-sm-6 mb-3">
                                <x-form.label for="video" value="{{ __('Youtube Property video Link') }}" />
                                <x-form.input id="video" class="block w-full mt-1" placeholder="video"
                                    type="text" name="video" :value="old('video')" autofocus />
                                <x-form.error for="video" />
                            </div>

                            <div class="row">

                                <div class="col-sm-6 mb-3">
                                    <x-form.label for="image" value="{{ __('Property Images') }}" />
                                    <x-form.input id="image" class="block w-full mt-1" placeholder="image" type="file"
                                        name="image[]" accept="image/*" multiple />
                                    <x-form.error for="image" />
                                </div>
                                
                                <div class="col-md-6 mb-2">
                                    <div id="preview"></div>
                                </div>
                            </div>

                            

                        </div>

                        {{-- <div class="row mt-2">
                            <label>Specifications (optional)</label>
                            <div class="o-features">
                                <ul class="ul-list third-row" style="list-style-type: none">
                                    <li>
                                        <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                            <input class="form-check-input" type="checkbox" id="specifications" name="specifications[]" value="fence">
                                            <label class="form-check-label" for="specifications">
                                                Fenced
                                            </label>
                                        </div>

                                    </li>

                                    <li>
                                        <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                            <input class="form-check-input" type="checkbox" id="specifications" name="specifications[]" value="wifi">
                                            <label class="form-check-label" for="specifications">
                                                Wifi
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                            <input class="form-check-input" type="checkbox" id="specifications" name="specifications[]" value="tiles">
                                            <label class="form-check-label" for="specifications">
                                                Tiles
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                            <input class="form-check-input" type="checkbox" id="specifications" name="specifications[]" value="park">
                                            <label class="form-check-label" for="specifications">
                                                Park
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                            <input class="form-check-input" type="checkbox" id="specifications"
                                                name="specifications[]" value="air-condition">
                                            <label class="form-check-label" for="specifications">
                                                Air conditioning
                                            </label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                            <input class="form-check-input" type="checkbox" id="specifications" name="specifications[]" value="pool">
                                            <label class="form-check-label" for="specifications">
                                                Swimming pool
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" id="submit_button" class="btn btn-primary block waves-effect waves-light pull-right">Save
                                Property</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    @section('scripts')
        <script>
             $(document).ready(function () {
                $('#image').on("change", previewImages);

                $('#createProperty').submit((e) => {
                    toggleAble('#submit_button', true, 'Submitting...');
                    e.preventDefault()
                    var data = $('#createProperty').serializeArray();
                    var url = "{{ route('property.store') }}";

                    // var specifications = data[9].value?.split(', ');
                    // data[9].value = JSON.stringify(specifications);
                    console.log(data);

                    $.ajax({
                        type: "POST", 
                        url, 
                        data
                    }).done((res) => {
                        toggleAble('#submit_button', false);
                        toastr.success(res.message, 'Success!');
                        console.log(res.message);
                        resetForm('#createProperty')
                    }).fail((res) => {
                        console.log(res.responseJSON.message);
                        toastr.error(res.responseJSON.message, 'Failed!');
                        toggleAble('#submit_button', false);
                    });
                })
            });

            function previewImages() {

                var $preview = $('#preview').empty();
                if (this.files) $.each(this.files, readAndPreview);

                function readAndPreview(i, file) {
                    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
                        return alert(file.name +" is not an image");
                    } // else...

                    if (file.size >= 2000000 ) {
                        return alert('You cannot upload this file because its size exceeds the maximum limit of 2 MB.');
                    }
                    
                    var reader = new FileReader();

                    $(reader).on("load", function() {
                        $preview.append($("<img/>", {src:this.result, height:100}));
                    });

                    reader.readAsDataURL(file);
                }

            }
        </script>
    @endsection

</x-app-layout>