<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Http\Requests\BookingRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateBooking implements ShouldQueue
{
    use Dispatchable;

    private $name;
    private $email;
    private $phone;
    private $passport;
    private $property;
    private $start;
    private $end;
    private $amenities;
    private $furnish;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $email,
        string $phone,
        ?string $passport,
        string $property,
        string $start,
        string $end,
        string $amenities,
        string $furnish
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->passport = $passport;
        $this->property = $property;
        $this->start = $start;
        $this->end = $end;
        $this->amenities = $amenities;
        $this->furnish = $furnish
    }

    public static function fromRequest(BookingRequest $request): self
    {
        return new static (
            $request->name(),
            $request->email(),
            $request->phone(),
            $request->passport(),
            $request->property(),
            $request->start(),
            $request->end(),
            $request->amenities(),
            $request->furnish(),
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): Booking
    {
        $booking  = new Booking([
            'name'  => $this->name
        ]);
    }
}
