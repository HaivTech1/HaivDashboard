<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Booking;
use App\Models\Property;
use App\Http\Requests\BookingRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateBooking implements ShouldQueue
{
    use Dispatchable;

    private $author;
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
        User $author,
        string $name,
        string $email,
        string $phone,
        ?string $passport,
        string $property,
        string $start,
        ?string $end,
        bool $amenities,
        array $furnish = []
    )
    {
        $this->author = $author;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->passport = $passport;
        $this->property = $property;
        $this->start = $start;
        $this->end = $end;
        $this->amenities = $amenities;
        $this->furnish = $furnish;
    }

    public static function fromRequest(BookingRequest $request): self
    {
        return new static (
            $request->author(),
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
        $property = Property::findOrFail($this->property);

        if (in_array(["logistics","cleaning", "fumigation" ], $this->furnish)){
            echo "Match found";
        }
            else
        {
            echo "Match not found";
        }
        
        $booking  = new Booking([
            'name'  => $this->name,
            'email'  => $this->email,
            'phone'  => $this->phone,
            'start'  => $this->start,
            'end'  => $this->end,
            'totalPrice'    => $property->price()
            'amenities'  => $this->amenities ? false : true,
            'furnish'  => json_encode($this->furnish),
            'property_uuid' => $this->property
        ]);

        $booking->authoredBy($this->author);
        $booking->save();

        return $booking;
    }
}
