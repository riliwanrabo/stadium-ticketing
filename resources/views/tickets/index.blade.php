@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-title">Tickets ({{ $tickets->count() }})</h2>
        {{-- list fixtures --}}
        <table class="table table-bordered table-striped">
            <thead>
                <th>Match Info</th>
                <th>Date &amp; Time</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    <tr>
                        <td> 
                            <span class="fixture-item">
                                <img src="{{ asset('images/badge.png') }}" alt="badge" width="30">
                                <b> {{ $ticket->fixture->home_team->name }}</b>  vs <b>{{ $ticket->fixture->away_team->name }}</b>
                            </span>
                        </td>

                        <td><b>{{ $ticket->fixture->fixture_date }}</b> @ <b>{{  $ticket->fixture->fixture_time }}</b></td>

                        <td>
                        <button id="view_ticket" data-ticket_id="{{ $ticket->id }}" class="btn btn-sm btn-success">View Ticket</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="3">- Not Data - <a href="/fixtures">See Fixtures</a></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@include('tickets.modals')
@push('scripts')

<script>
    $(function(){
        $('.fixture-btn').click(function(e){
            // get match info
            let fixture_id = $(this).data('fixture');
            let url = `/fetch-fixture-info/${fixture_id}`;
            $.post(url,{
                _token: '{{ csrf_token() }}'
            }, function(result){
                let data = result.data;
                let modal_info = {
                    title: `<b>${data.home_team.name}</b> vs <b>${data.away_team.name}</b>`,
                    fixture_id: `${data.id}`,
                    body: ``
                }
                let modal = $('#fixtureModal');
                modal.find('.modal-title').html(modal_info.title);
                modal.find('#fixture_id').val(modal_info.fixture_id);
                modal.modal()
            })
            
        });

        // process payment/booking

        $('body').on('click', '#view_ticket', function(e){
            e.preventDefault();
            // debugger;
            var ticket_id = $(this).data('ticket_id');
            $.get('/tickets/'+ticket_id, function(result){
                console.log(result);
                // alert(result.message);
                // close latter modal
                // $('#fixtureModal').modal('hide');
                let data = result.data;
                let modal_info = {
                    fullname: `${data.user.name}`,
                    title: `<b>${data.fixture.home_team.name}</b> vs <b>${data.fixture.away_team.name}</b>`,
                    date: `${data.fixture.fixture_date}`,
                    time: `${data.fixture.fixture_time}`,
                    body: ``
                }
                let modal = $('#TicketModal');
                modal.find('.fullname').html(modal_info.fullname);
                modal.find('.teams').html(modal_info.title);
                modal.find('#TicketModalLabel').html('Ticket Details');
                modal.find('.ticket_date').html(modal_info.date);
                modal.find('.ticket_time').html(modal_info.time);
                modal.modal('show');

            });
        });


        
    });

    $("#print_ticket").click(function(e){
        e.preventDefault();
            // alert('this has been clicked')
            $(".print-area").printThis();

        });
</script>
@endpush