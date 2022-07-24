<?php

namespace App\Http\Livewire\AdminTicket;

use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminTicketController extends Component
{
    use AuthorizesRequests;

    public function mount(){
        $this->authorize('admin');
    }
    public function render()
    {
        $tickets = Ticket::get();
        return view('livewire.admin-ticket.admin-ticket-controller'
        ,['tickets'=>$tickets]
        )->extends('layouts.app');
    }
}
