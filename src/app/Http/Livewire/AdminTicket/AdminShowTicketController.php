<?php

namespace App\Http\Livewire\AdminTicket;

use App\Mail\ReplyMail;
use Livewire\Component;
use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;

class AdminShowTicketController extends Component
{
    public $ticket;
    public $UserId ;
    public $message;
    protected $rules = [
        'message' => 'required|regex:/^[\pL\d\s\-*!?؟._&]+$/u|max:120',
    ];
    protected function resetAll(){
        $this->resetValidation();
        $this->message = "";
    }
    public function mount($id){
        $this->ticket = Ticket::whereId($id)->first();
        $this->UserId = auth()->id();
    }
    public function Reply(){
        $data = $this->validate();
        Message::create([
            'message' =>$data['message'] ,
            'user_id'=> $this->UserId,
            'ticket_id'=>$this->ticket->id
        ]);

        Mail::to($this->ticket->email)->send(new ReplyMail($this->ticket->id));
        $this->resetAll();
    }
    public function render()
    {
        $messages = Message::where('ticket_id',$this->ticket->id)->get();
        return view('livewire.admin-ticket.admin-show-ticket-controller',
        ['messages'=>$messages]
        )->extends('layouts.app');
    }
}
