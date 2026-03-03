@extends('layouts.app') 

@section('content')
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach($tickets as $ticket)
        <div class="swiper-slide"
            data-name="{{ $ticket->event_name }}"
            data-date="{{ $ticket->event_datetime->format('D - M - d ~ h:i A') }}"
            data-location="{{ $ticket->venue }}">

            <div class="ticket-card">
                <div class="ticket-header">{{ $ticket->ticket_type }}</div>

                <div class="ticket-details">
                    <div>
                        <div class="first">SEC</div>
                        <strong class="second">{{ $ticket->section }}</strong>
                    </div>
                    <div>
                        <div class="first">ROW</div>
                        <strong class="second">{{ $ticket->row }}</strong>
                    </div>
                    <div>
                        <div class="first">SEAT</div>
                        <strong class="second">{{ $ticket->seat }}</strong>
                    </div>
                </div>

                <div class="ticket-footer">Standard Admission</div>

                <div class="barcode-section">
                    <img src="{{ asset('assets/img/barcode.png') }}" alt="Barcode" class="barcode-image">
                    <p>Screenshots won't get you in.</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

<div class="swiper-controls">
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
</div>

@endsection