<?php

namespace App\Jobs;

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
        string $name,
        string $name,
        string $name,
        string $name,
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
