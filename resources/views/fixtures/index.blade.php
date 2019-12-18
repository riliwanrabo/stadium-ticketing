@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-title">Fixtures</h2>
        <p><a href="/tickets">view tickets</a></p>
        {{-- list fixtures --}}
        <table class="table table-bordered table-striped">
            <thead>
                <th>Home</th>
                <th>Away</th>
                <th>Action</th>
                {{-- <th></th> --}}
            </thead>
            <tbody>
                @forelse ($fixtures as $fixture)
                    <tr>
                        <td> 
                            <span class="fixture-item">
                                <img src="{{ asset('images/badge.png') }}" alt="badge" width="30">
                                <b>{{ $fixture->home_team->name ?? '-' }}</b>
                            </span>
                        </td>
                        <td>
                            <span class="fixture-item">
                                    <img src="{{ asset('images/badge2.png') }}" alt="badge" width="30">
                                <b>{{ $fixture->away_team->name ?? '-' }}</b>
                            </span>            
                        </td>
                        <td>
                            <span class="button-wrapper">
                                <button class="btn btn-sm btn-success fixture-btn" data-fixture="{{ $fixture->id }}">Book Fixture</button>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            - No Data - <a href="/populate-fixtures">Auto-Populate fixtures</a>
                        </td>
                    </tr>    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@include('fixtures.modals')
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
        $('#pay_button').click(function(e){
            e.preventDefault();
            let url = '{{ route('tickets.store') }}';
            let fixture_id = $(this).parents('.modal-footer').find('#fixture_id').val();
            $.post(url, {
                _token: '{{ csrf_token() }}',
                'fixture_id': fixture_id
            }, function(result){
                console.log(result);
                alert(result.message);
                // close latter modal
                $('#fixtureModal').modal('hide');
                let data = result.data;
                let modal_info = {
                    fullname: `${data.user.first_name} ${data.user.last_name}`,
                    title: `<b>${data.fixture.home_team.name}</b> vs <b>${data.fixture.away_team.name}</b>`,
                    date: `<b>${data.fixture.fixture_date}</b>`,
                    time: `<b>${data.fixture.fixture_time}</b>`,
                    body: ``
                }
                console.log(modal_info);
                let modal = $('#TicketModal');
                modal.find('.fullname').html(modal_info.fullname);
                modal.find('.teams').html(modal_info.title);
                modal.find('#TicketModalLabel').html('Ticket Details');
                modal.find('.ticket_date').html(modal_info.date);
                modal.find('.ticket_time').html(modal_info.time);
                modal.modal('show')

            });
        });
    });
</script>
@endpush