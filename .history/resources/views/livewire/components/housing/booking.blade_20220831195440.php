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
                                <button type="button"
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
</div>
