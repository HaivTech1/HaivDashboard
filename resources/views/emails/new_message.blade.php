@component('mail::message')
**{{ $contact->name() }}** has just sent you a message from {{ application('name') }}


@component('mail::panel')
{{ $contact->message() }}
@endcomponent

@component('mail::button', ['url' => route('contact.show', $contact)])
View Message
@endcomponent

Thanks, <br />
Team {{ application('name') }}, {{ date('Y') }}.
@endcomponent