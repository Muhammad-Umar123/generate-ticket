<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>


    </style>
</head>

<body>

    <div class="header-banner">
        <h5 id="event-name"></h5>
        <small id="event-info"></small>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                init: function() {
                    updateHeader(this.slides[this.activeIndex]);
                },
                slideChange: function() {
                    updateHeader(this.slides[this.activeIndex]);
                }
            }

        });

        function updateHeader(activeSlide) {
            document.getElementById('event-name').innerText = activeSlide.dataset.name;
            document.getElementById('event-info').innerText = activeSlide.dataset.date + ' · ' + activeSlide.dataset.location;
        }
    </script>

</body>

</html>