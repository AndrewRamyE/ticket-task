<?php

namespace App\Http\Livewire\Ticket;

use App\Mail\AcknowledgeMail;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class TicketController extends Component
{
    public $ticket ;
    public $UserId ;
    public $ID ;
    public $showEditModal = false;
    public $showDeleteModal = false;
    protected $listeners = [ 'closemodel' => 'CloseModal' ];

    protected $rules = [
        'ticket.email' => 'required|email',
        'ticket.subject' => 'required|regex:/^[\pL\d\s\-*!?؟._&]+$/u|max:120',
        'ticket.content' => 'required|regex:/^[\pL\d\s\-*!?؟._&]+$/u|max:220',
    ];
    protected function resetAll(){
        $this->resetValidation();
        $this->ticket = new Ticket();
        $this->ID = "";
    }
    public function mount(){
        $this->ticket = new Ticket();
        $this->UserId = auth()->id();
    }
    public function OpenEditModal($id){
        $this->ID = $id ;
        $this->ticket = Ticket::find($id);
        $this->showEditModal = true;
    }
    public function OpenDeleteModal($id){
        $this->ID = $id ;
        $this->showDeleteModal = true;
    }
    public function CloseModal(){
        $this->resetAll();
        $this->showDeleteModal = false;
        $this->showEditModal = false;
    }
    public function Create(){
        $this->validate();
        $this->ticket->user_id = $this->UserId ;
        $this->ticket->save();
        Mail::to($this->ticket->email)->send(new AcknowledgeMail($this->ticket->id));
        $this->resetAll();
    }
    public function Edit(){
        $this->validate();
        $this->ticket->save();
        $this->resetAll();
    }
    public function Delete(){
        $ticket = Ticket::find($this->ID);
        $ticket->delete();
        $this->resetAll();
    }
    public function render()
    {
        $tickets = Ticket::where('user_id',$this->UserId)->get();
        return view('livewire.ticket.ticket-controller',
        ['tickets'=>$tickets])->extends('layouts.app');
    }
}
