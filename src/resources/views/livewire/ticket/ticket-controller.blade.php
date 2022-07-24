<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">tickets</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form wire:submit.prevent="Create">
                            <div class="mb-3">
                                <label  class="form-label">Email address</label>
                                <input wire:model.defer="ticket.email" type="email" class="form-control" placeholder="name@example.com">
                              </div>
                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <input wire:model.defer="ticket.subject" type="text" class="form-control"  placeholder="Subject">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Content</label>
                                <textarea wire:model.defer="ticket.content" class="form-control"  rows="3"></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Content</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($tickets) > 0)
                                @foreach($tickets as $ticket)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $ticket->email }}</td>
                                    <td>{{ $ticket->subject }}</td>
                                    <td>{{ str_word_count($ticket->content) > 1 ?substr($ticket->content, 0, strpos(wordwrap($ticket->content, 15), "\n")) . " ..." : $ticket->content  }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('ticket',$ticket->id) }}">
                                        Show
                                        </a>
                                        <button wire:click="OpenEditModal({{ $ticket->id }})" class="btn btn-info">
                                        <span class="fa fa-trash"></span> Edit
                                        </button>
                                        <button wire:click="OpenDeleteModal({{ $ticket->id }})" class="btn btn-danger">
                                        <span class="fa fa-trash"></span> Delete
                                        </button>
                                    </td>
                                  </tr>
                                @endforeach
                            @else
                            <tr>
                                <th colspan="5">no tickets</th>
                              </tr>
                            @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.ticket.delete-modal')
    @include('livewire.ticket.edit-modal')
</div>
