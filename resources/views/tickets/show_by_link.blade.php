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

                    <div class="barcode-wrapper">
                        <canvas class="pdf417Canvas"
                            data-link="{{ $ticket->ticket_link }}">
                        </canvas>
                        <div class="scan-effect"></div>
                        <div class="scan-effect-second"></div>
                    </div>

                    <p class="barcode-text">Screenshots won't get you in.</p>

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
@push('scripts')
<script>
    function generateAllBarcodes() {

        document.querySelectorAll(".pdf417Canvas").forEach(function(canvas) {

            const ticketLink = canvas.dataset.link;
            const dynamicValue = ticketLink + "_" + Date.now();

            try {
                bwipjs.toCanvas(canvas, {
                    bcid: 'pdf417',
                    text: dynamicValue,
                    scale: 2,
                    height: 15,
                    includetext: false
                });
            } catch (e) {
                console.error("Barcode error:", e);
            }

        });
    }

    generateAllBarcodes();

    setInterval(generateAllBarcodes, 5000);
</script>
@endpush