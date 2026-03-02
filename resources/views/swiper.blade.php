<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Swiper Ticket</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>

    <style>
        body{
            background:#ddd;
        }

        .header-banner{
            background:#0d6efd;
            color:white;
            text-align:center;
            padding:15px;
        }

        /* Swiper Card Area */
        .swiper {
            margin: 50px auto 0;
            width: 100%;
            max-width: 320px;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
        }

        /* Ticket Card */
        .ticket-card{
            width:100%;
            background:white;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
        }

        .ticket-header,
        .ticket-footer{
            background:#0d6efd;
            color:white;
            padding:10px;
            font-weight:600;
            text-align:center;
        }

        .ticket-details{
            display:flex;
            justify-content:space-around;
            padding:20px 10px;
            background:#1e73d8;
            color:white;
        }

        .barcode-section{
            padding:20px;
            text-align:center;
        }

        /* Controls BELOW card */
        .swiper-controls {
            max-width: 320px;
            margin: 15px auto 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .swiper-button-next,
        .swiper-button-prev {
            position: static !important;
            width: 30px;
            height: 30px;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 18px;
        }

        .swiper-pagination {
            position: static !important;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="header-banner">
    <h5>Disney On Ice presents Find Your Hero</h5>
    <small>SAT - DEC - 2 ~ 3:00 PM · Vibrant Arena at The Mark</small>
</div>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide">
            <div class="ticket-card">
                <div class="ticket-header">Standard Admission</div>

                <div class="ticket-details">
                    <div>
                        <div>SEC</div>
                        <strong>111</strong>
                    </div>
                    <div>
                        <div>ROW</div>
                        <strong>18</strong>
                    </div>
                    <div>
                        <div>SEAT</div>
                        <strong>13</strong>
                    </div>
                </div>

                <div class="ticket-footer">Standard Admission</div>

                <div class="barcode-section">
                    <p>Screenshots won't get you in.</p>
                </div>
            </div>
        </div>

        <!-- Extra Slides -->
        <div class="swiper-slide"><div class="ticket-card p-5 text-center">Slide 2</div></div>
        <div class="swiper-slide"><div class="ticket-card p-5 text-center">Slide 3</div></div>
        <div class="swiper-slide"><div class="ticket-card p-5 text-center">Slide 4</div></div>

    </div>
</div>

<!-- Controls OUTSIDE Swiper -->
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
    });
</script>

</body>
</html>