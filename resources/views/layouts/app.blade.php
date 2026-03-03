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

    @yield('content')
    
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