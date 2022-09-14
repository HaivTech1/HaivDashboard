<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <x-search />
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-plus me-1"></i> Add New Booking</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll" wire:model="selectPageRows">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Order ID</th>
                                    <th class="align-middle">Billing Name</th>
                                    <th class="align-middle">Payment Status</th>
                                    <th class="align-middle"></th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" value="{{ $booking->id() }}" type="checkbox" id="{{ $booking->id() }}" wire:model="selectedRows">
                                            <label class="form-check-label" for="{{ $booking->id() }}"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $booking->id() }}</a> </td>
                                    <td>{{ $booking->name()}}</td>
                                    <td>
                                        @if ($booking->isPaid == false )
                                        <span class="badge badge-pill badge-soft-danger font-size-12">
                                            {{ $booking->payment_badge }}</span>
                                        @else
                                        <span class="badge badge-pill badge-soft-success font-size-12">
                                            {{ $booking->payment_badge }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <span class="{{  $booking->level_badge }}">
                                            {{ ucwords($booking->level()) }}</span>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button"  wire:click="bookingDetails({{ $booking }})" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#details">
                                            <i class="bx bx-show-alt"></i> View Details
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $bookings->links('pagination::custom-pagination')}}
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Add New Booking</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <form id="createBooking" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <x-form.label for='name' value="{{ __('Name') }}" />
                    <x-form.input id='name' class="block w-full mt-1" :value="old('name')"
                        name='name' />
                    <x-form.error for="name" />
                </div>
                <div class="col-sm-6">
                    <x-form.label for='email' value="{{ __('Email') }}" />
                    <x-form.input id='email' class="block w-full mt-1" :value="old('email')"
                        name='email' />
                    <x-form.error for="email" />
                </div>
                <div class="col-sm-6">
                    <x-form.label for='phone' value="{{ __('Phone') }}" />
                    <x-form.input id='phone' class="block w-full mt-1" :value="old('phone')"
                        name='phone' />
                    <x-form.error for="phone" />
                </div>
                <div class="col-sm-6">
                    <x-form.label for='passport' value="{{ __('Passport') }}" />
                    <x-form.input id='passport' type="file" class="block w-full mt-1" :value="old('passport')"
                        name='passport' />
                    <x-form.error for="passport" />
                </div>

                <div class="col-sm-12 mt-2">
                    <x-form.label for="roperty_uuid" value="{{ __('Proprerty') }}" />
                    <select class="form-control" name="property_uuid">
                        <option>Select</option>
                        @foreach ($properties as $id => $property)
                        <option value="{{ $id }}">{{ $property }}</option>
                        @endforeach
                    </select>
                    <x-form.error for="roperty_uuid" />
                </div>

                <div class="form-group row mt-4 mb-4">
                    <label class="col-form-label col-lg-4">Duration</label>
                    <div class="col-lg-8">
                        <div class="input-daterange input-group" data-provide="datepicker">
                            <x-form.input id="start" class="block w-full mt-1" type="text" name="start"
                                id="start" placeholder="Starts" :value="old('start')" autofocus />
                            <x-form.input id="end" class="block w-full mt-1" type="text" name="end"
                                id="end" placeholder="Ends" :value="old('end')" autofocus />
                            <x-form.error for="end" />
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="d-flex mt-3">

                        <input type="checkbox" id="switch1" switch="none" checked value="1"
                            name="amenities" class="mr-4"/>
                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                        <span class="text-bold font-semibold text-primary uppercase">Get Amenities update</span>
                    </div>
                    <x-form.error for="amenities" />
                </div>

                <div class="row mt-2">
                    <label>Furnishing</label>
                    <div class="o-features">
                        <ul class="ul-list third-row" style="list-style-type: none">
                            <li>
                                <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                    <input class="form-check-input" type="checkbox" id="logistics" name="furnish[]" value="logistics">
                                    <label class="form-check-label" for="logistics">
                                        Logistics
                                    </label>
                                </div>

                            </li>

                            <li>
                                <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                    <input class="form-check-input" type="checkbox" id="cleaning" name="furnish[]" value="cleaning">
                                    <label class="form-check-label" for="cleaning">
                                        Cleaning
                                    </label>
                                </div>
                            </li>

                            <li>
                                <div class="form-check form-checkbox-outline form-check-primary mb-3">
                                    <input class="form-check-input" type="checkbox" id="fumigation" name="furnish[]" value="fumigation">
                                    <label class="form-check-label" for="fumigation">
                                        Fumigation
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 

                <div class="col-md-12 mt-2 mb-2">
                    <div id="preview"></div>
                </div>

                <div class="col-sm-12 mt-2">
                    <div class="pull-right">
                        <button type="submit" id="submit_button" class="btn btn-secondary">Submit</button>
                    </div>
                </div>

                
            </div>
          </form>
        </div>
    </div>

    @if ($booking_detail)
    <div id="details" class="modal fade" tabindex="-1" aria-labelledby="#details" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFullscreenLabel">Booking for {{ $booking_detail->name() }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex">
                       
                        <div class="flex-shrink-0 me-4">
                            @if ($booking_detail->property->image)
                                <img src="{{ $booking_detail->property->image()[0] }}" alt="{{ $booking_detail->property->title() }}" class="avatar-sm">
                            @endif
                        </div>

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15">{{ $booking_detail->property->title() }} <span>
                                <i class="bx bx-home-circle"></i>
                            </span></h5>
                            <p class="text-muted">{{ $booking_detail->property->address() }}</p>
                        </div>
                    </div>

                    <h5 class="font-size-15 mt-4"><i class="bx bx-credit-card-alt text-primary me-1"></i> {{ number_format( $booking_detail->total(), 2) }}</h5>

                    <div class="row">
                        <div class="col-sm-6">
                                <h1 class="text-lg text-bold">
                                <p><i class="bx bx-mail-send text-primary me-1"></i>{{ $booking_detail->email() }} </p>
                                <p><i class="bx bx-phone-outgoing text-primary me-1"></i> {{ $booking_detail->phone() }}</p>
                                <p><i class="bx bxs-user-circle text-primary me-1"></i> {{ $booking_detail->name() }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-nowrap align-middle table-hover mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span>Booking Level</span>
                                            </td>
                                            <td>
                                                <span class="{{  $booking_detail->level_badge }}">
                                                    {{ ucwords($booking_detail->level()) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Booking Furnish</span>
                                            </td>
                                            <td>
                                                @foreach ($booking_detail->furnish() as $detail)
                                                    <span class="badge badge-soft-primary p-2">{{ $detail }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Payment Status</span>
                                            </td>
                                            <td>
                                                @if ($booking->isPaid == false )
                                                <span class="badge badge-pill badge-soft-danger font-size-12">
                                                    {{ $booking->payment_badge }}</span>
                                                @else
                                                <span class="badge badge-pill badge-soft-success font-size-12">
                                                    {{ $booking->payment_badge }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Payment Time</span>
                                            </td>
                                            <td>
                                                @if ($booking_detail->paidAt)
                                                    <span class="{{  $booking_detail->level_badge }}">
                                                        {{ ucwords($booking_detail->paidAt()) }}</span>
                                                @endif  
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Payment Method</span>
                                            </td>
                                            <td>
                                                <span class="{{  $booking_detail->level_badge }}">
                                                    {{ ucwords($booking_detail->level()) }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                <p class="text-muted mb-0">{{ $booking_detail->start() }}</p>
                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due Date</h5>
                                <p class="text-muted mb-0">{{ $booking_detail->end() }}</p>
                            </div>
                        </div>
                    </div>               
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    @endif

    @section('scripts')

        <script>
            $(document).ready(function () {
                $('#passport').on("change", previewImages);

                $('#createBooking').submit((e) => {
                    toggleAble('#submit_button', true, 'Submitting...');
                    e.preventDefault()
                    var data = $('#createBooking').serializeArray();
                    var url = "{{ route('booking.store') }}";

                  
                    // console.log(data);

                    $.ajax({
                        type: "POST", 
                        url, 
                        data
                    }).done((res) => {
                        toggleAble('#submit_button', false);
                        
                        if(res.success == true){
                            toastr.success(res.message, 'Success!');
                        }else{
                            toastr.error(res.message, 'Failed!');
                        }
                        console.log(res);
                        resetForm('#createBooking')
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
</div>
