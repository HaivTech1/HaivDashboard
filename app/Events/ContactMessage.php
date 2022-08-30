<?php

namespace App\Events;

use App\Models\Contact;
use Illuminate\Queue\SerializesModels;

class ContactMessage
{
    use SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
}
