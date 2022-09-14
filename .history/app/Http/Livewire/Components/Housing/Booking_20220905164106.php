<?php

namespace App\Http\Livewire\Components\Housing;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;
use App\Events\BookingAccepted;
use App\Models\Booking as CustomerBookings;

class Booking extends Component
{

    use WithPagination;
    public $selectedRows = [];
    public $selectPageRows = false;
    public $per_page = 5;
    public $sortBy = 'asc';
    public $orderBy = 'created_at';
    public $search = '';
    public $booking_detail ;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->bookings->pluck('uuid')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getBookingsProperty()
    {
        return CustomerBookings::search(trim($this->search))->orderBy($this->orderBy, $this->sortBy)
        ->latest()->paginate($this->per_page);
    }

    public function accept($id)
    {
        dd($id);
        $booking = CustomerBookings::where('uuid', $id)->first();
        $booking->update(['isAccepted' => true]);

        event(new BookingAccepted($booking));

        $this->dispatchBrowserEvent('success', [
            'message'     => $booking->property->title().' accepted successfully',
        ]);

        $this->reset();

    }

    public function unaccept($id)
    {
        dd($id);
        $booking = CustomerBookings::where('uuid', $id)->first();
        $booking->update(['isAccepted' => false]);

        event(new BookingRejectted($booking));

        $this->dispatchBrowserEvent('success', [
            'message'     => $booking->property->title().' declined successfully',
        ]);

        $this->reset();

    }

    public function bookingDetails(CustomerBookings $booking)
    {
        $this->booking_detail  = $booking;
        $this->dispatchBrowserEvent('show-details');
    }

    public function deleteAll()
    {
        CustomerBookings::whereIn('id', $this->selectedRows)->delete();

        $this->dispatchBrowserEvent('success', ['message' => 'All selected users
            were deleted']);

        $this->reset(['selectedRows', 'selectPageRows']);
    }
    
    public function render()
    {
        return view('livewire.components.housing.booking', [
            'bookings' => $this->bookings,
            'properties' => Property::available()->pluck('title', 'uuid')
        ]);
    }
}