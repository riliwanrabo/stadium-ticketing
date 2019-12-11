@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-title">Teams ({{ $teams->count() }})</h2>
        {{-- list fixtures --}}
        <table class="table table-bordered table-striped">
            <thead>
                <th>Name</th>
                {{-- <th></th> --}}
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td> 
                            <span class="fixture-item">
                                <img src="{{ asset('images/badge.png') }}" alt="badge" width="30">
                                <b>{{ $team->name ?? '-' }}</b>
                            </span>
                        </td>
                    </tr>
                @endforeach
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
                modal.find('.ticket_date').val(modal_info.date);
                modal.find('.ticket_time').val(modal_info.time);
                modal.modal('show');

            });
        });
    });
</script>
@endpush