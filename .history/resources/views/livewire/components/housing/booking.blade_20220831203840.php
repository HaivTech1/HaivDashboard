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
                                    <th class="align-middle">Date</th>
                                    <th class="align-middle">Total</th>
                                    <th class="align-middle">Payment Status</th>
                                    <th class="align-middle">Booking Status</th>
                                    <th class="align-middle">Payment Method</th>
                                    <th class="align-middle">View Details</th>
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
                                    <td>{{ $booking->author()->name()}}</td>
                                    <td>
                                        {{ $booking->createdAt()}}
                                    </td>
                                    <td>
                                        {{ trans('global.naira') }}
                                        {{ number_format($booking->total(), 2) }}
                                    </td>
                                    <td>
                                        @if ($booking->payment_badge === 'Pending' )
                                        <span class="badge badge-pill badge-soft-danger font-size-12">
                                            {{ $booking->payment_badge }}</span>
                                        @elseif($booking->payment_badge === 'Paid')
                                        <span class="badge badge-pill badge-soft-success font-size-12">
                                            {{ $booking->payment_badge }}</span>
                                        @elseif($booking->payment_badge === 'Refund')
                                        <span class="badge badge-pill badge-soft-warning font-size-12">
                                            {{ $booking->payment_badge }}</span>
                                        @elseif($booking->payment_badge === 'ChargeBack')
                                        <span class="badge badge-pill badge-soft-primary font-size-12">
                                            {{ $booking->payment_badge }}</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($booking->verify_badge === 'Pending' )
                                        <span class="badge badge-pill badge-soft-danger font-size-12">
                                            {{ $booking->verify_badge }}</span>
                                        @else
                                        <span class="badge badge-pill badge-soft-success font-size-12">
                                            {{ $booking->verify_badge }}</span>
                                        @endif

                                    </td>
                                    <td>

                                        @if($booking->payment_badge === 'Paid')
                                        <i class="{{ $booking->payment_method_badge }}"></i>
                                        @else
                                        ---
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                            View Details
                                        </button>
                                    </td>
                                    <td>
                                        <livewire:components.general-action :model="$booking" :wire:key="$booking->id()" />
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
                    <x-form.label for='name' value="{{ __('name') }}" />
                    <x-form.input id='name' class="block w-full mt-1" :value="old('name')"
                        name='name' />
                    <x-form.error for="name" />
                </div>
                <div class="col-sm-6">
                    <x-form.label for='email' value="{{ __('email') }}" />
                    <x-form.input id='email' class="block w-full mt-1" :value="old('email')"
                        name='email' />
                    <x-form.error for="email" />
                </div>
                <div class="col-sm-6">
                    <x-form.label for='phone' value="{{ __('phone') }}" />
                    <x-form.input id='phone' class="block w-full mt-1" :value="old('phone')"
                        name='phone' />
                    <x-form.error for="phone" />
                </div>
                <div class="col-sm-6">
                    <x-form.label for='passport' value="{{ __('passport') }}" />
                    <x-form.input id='passport' type="file" class="block w-full mt-1" :value="old('passport')"
                        name='passport' />
                    <x-form.error for="passport" />
                </div>

                <div class="col-md-6 mb-2">
                    <div id="preview"></div>
                </div>

                <div class="col-sm-12 mt-2">
                    <div class="pull-right">
                        <button type="submit" id="submit_button" class="btn btn-secondary">Add</button>
                    </div>
                </div>

                
            </div>
          </form>
        </div>
    </div>

    @section('scripts')

        <script>
            $(document).ready(function () {
                $('#passport').on("change", previewImages);

                $('#createBooking').submit((e) => {
                    toggleAble('#submit_button', true, 'Submitting...');
                    e.preventDefault()
                    var data = $('#createBooking').serializeArray();
                    var url = "{{ route('booking.store') }}";

                  
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
</div>
