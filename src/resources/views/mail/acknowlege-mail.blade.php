@component('mail::message')
    Thanks for using our service and we will reply soon .

    @component('mail::button', ['url' => route('ticket', ['id' => $ticket->id])])
        view your ticket
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
