<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">tickets</div>
                <div class="card-body">
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
                                        <a class="btn btn-success" href="{{ route('admin.ticket',$ticket->id) }}">
                                        Show
                                        </a>
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
</div>
