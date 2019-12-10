@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-title">Fixtures</h2>
        {{-- list fixtures --}}
        <table class="table table-bordered table-striped">
            <thead>
                <th>Home</th>
                <th>Away</th>
                <th>Action</th>
                {{-- <th></th> --}}
            </thead>
            <tbody>
                @foreach ($fixtures as $fixture)
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
            }, function(data){
                console.log(data)
            })
            let modal = $('#fixtureModal');
            let modal_info = {
                title: '',
                body: '',
            }

            modal.modal()
        });
    });
</script>
@endpush