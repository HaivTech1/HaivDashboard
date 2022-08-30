<?php

namespace App\Jobs;

use App\Models\Contact;
use App\Events\ContactMessage;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateContact implements ShouldQueue
{
    use Dispatchable;

    private $name;
    private $email;
    private $phnoe;
    private $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        ?string $email,
        ?string $phone,
        string $message
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    public static function fromRequest(StoreContactRequest $request): self
    {
        return new static (
            $request->name(),
            $request->email(),
            $request->phone(),
            $request->message(),
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): Contact
    {
        $contact = new Contact([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message
        ]);

        $contact->save();
        
        event(new ContactMessage($contact));

        return $contact;
    }
}
