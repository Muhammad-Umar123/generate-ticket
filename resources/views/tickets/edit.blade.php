@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="section-header-breadcrumb-content">
                    <h1>Edit Ticket</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i></a></div>
                        <div class="breadcrumb-item"><a href="#">Tickets</a></div>
                        <div class="breadcrumb-item"><a href="#">Edit Ticket</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <form action="{{ route('tickets.update', $id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Ticket</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Event Name</label>
                                    <input type="text" class="form-control {{ $errors->has('event_name') ? 'is-invalid' : (old('event_name') ? 'is-valid' : '') }}" name="event_name" value="{{ $ticket->event_name ?? old('event_name') }}">
                                    @error('event_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Event Date</label>
                                    <input type="datetime-local" class="form-control {{ $errors->has('event_datetime') ? 'is-invalid' : (old('event_datetime') ? 'is-valid' : '') }}" name="event_datetime" value="{{ $ticket->event_datetime ? \Carbon\Carbon::parse($ticket->event_datetime)->format('Y-m-d\TH:i') : old('event_datetime') }}">
                                    @error('event_datetime')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Venue</label>
                                    <input type="text" class="form-control {{ $errors->has('venue') ? 'is-invalid' : (old('venue') ? 'is-valid' : '') }}" name="venue" value="{{ $ticket->venue ?? old('venue') }}">
                                    @error('venue')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Section</label>
                                    <input type="text" class="form-control {{ $errors->has('section') ? 'is-invalid' : (old('section') ? 'is-valid' : '') }}" name="section" value="{{ $ticket->section ?? old('section') }}">
                                    @error('section')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Row Number</label>
                                    <input type="text" class="form-control {{ $errors->has('row') ? 'is-invalid' : (old('row') ? 'is-valid' : '') }}" name="row" value="{{ $ticket->row ?? old('row') }}">
                                    @error('row')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Seat Number</label>
                                    <input type="text" class="form-control {{ $errors->has('seat') ? 'is-invalid' : (old('seat') ? 'is-valid' : '') }}" name="seat" value="{{ $ticket->seat ?? old('seat') }}">
                                    @error('seat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Ticket Type</label>
                                    <input type="text"
                                        name="ticket_type"
                                        value="{{ $ticket->ticket_type ?? old('ticket_type') }}"
                                        class="form-control {{ $errors->has('ticket_type') ? 'is-invalid' : (old('ticket_type') ? 'is-valid' : '') }}">

                                    @error('ticket_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Ticket Link</label>
                                    <div class="input-group">
                                        <input type="text"
                                            name="ticket_link"
                                            value="{{ old('ticket_link', $ticket->ticket_link ?? '') }}"
                                            class="form-control @error('ticket_link') is-invalid @elseif(old('ticket_link')) is-valid @enderror">
                                        <button type="button" class="btn btn-outline-secondary" id="regenerateLink">
                                            <i class="fa-solid fa-arrow-rotate-right" id="regenerate-link-btn" ></i>
                                        </button>
                                    </div>
                                    @error('ticket_link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection