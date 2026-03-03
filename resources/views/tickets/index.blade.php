@extends('layouts.main')

@section('content')

<section class="section">
    <div class="section-header">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="section-header-breadcrumb-content">
                    <h1>Tickets</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
                        <div class="breadcrumb-item"><a href="#">Tickets</a></div>
                        <div class="breadcrumb-item"><a href="#">All Tickets</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ticket List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Event Name</th>
                                        <th>Event Datetime</th>
                                        <th>Venue</th>
                                        <th>Section</th>
                                        <th>Row Number</th>
                                        <th>Seat Number</th>
                                        <th>Ticket Type</th>
                                        <th>Ticket Link</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ $ticket->event_name }}</td>
                                        <td>{{ $ticket->event_datetime }}</td>
                                        <td>{{ $ticket->venue }}</td>
                                        <td>{{ $ticket->section }}</td>
                                        <td>{{ $ticket->row }}</td>
                                        <td>{{ $ticket->seat }}</td>
                                        <td>{{ $ticket->ticket_type }}</td>
                                        <td><a href="{{ route('tickets.showTicketsByLink', $ticket->ticket_link) }}" target="_blank" class="showTicketsByLink">
                                                {{ $ticket->ticket_link }}</a></td>
                                        <td style="display: flex; gap: 10px;">
                                            <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="background-color: #ed0707;">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection