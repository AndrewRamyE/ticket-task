@component('mail::message')
    You have reseved a new reply .

    @component('mail::button', ['url' => route('ticket', ['id' => $ticket->id])])
        view your ticket
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
