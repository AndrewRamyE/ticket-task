<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">ticket</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Email : {{ $ticket->email }}</p>
                            <p>Subject : {{ $ticket->subject }}</p>
                            <p>Content : {{ $ticket->content }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form wire:submit.prevent="Reply">
                            <div class="input-group mb-3">
                                    <input wire:model.defer='message' type="text" class="form-control" placeholder="Reply" aria-label="Reply" aria-describedby="Reply">
                                    <button class="btn btn-outline-secondary" >Reply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if(!empty($messages) && count($messages) > 0)
                                @foreach($messages as $message)
                                <div class="chat @if ($message->user->is_admin) darker @endif">
                                    <p>@if ($message->user->is_admin) Admin : @else User : @endif{{  $message->message }}</p>
                                    <span class=" @if ($message->user->is_admin) time-left @else time-right @endif">{{  $message->created_at->diffForHumans() }}</span>
                                  </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

