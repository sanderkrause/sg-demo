<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Sander Krause - sander@madebysander.nl">

    <title>Amy & Dave Bakery</title>

    <link href="{{ asset('css/app.css')  }}" rel="stylesheet">
</head>

<body>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('images/header-1.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Freshly baked</h3>
                    <p>Every piece of our handcrafted breads is handmade by us</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('images/header-2.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>With a smile</h3>
                    <p>We aim to be the best in our branche</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('images/header-3.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Good food, Good mood</h3>
                    <p>Food is important to stay happy</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<div class="container">

    <h1 class="my-4">Welcome to Amy & Dave's Bakery</h1>

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-6">
            <p>At this moment, we are <strong>{{ $isOpen ? 'Open' : 'Closed' }}</strong></p>
            @if (!$isOpen)
                <p>We will be open again on {{ $nextOpen->format(DateTimeInterface::RFC7231) }}</p>
            @endif
        </div>
        <div class="col-lg-6">
            <!-- TODO date picker -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Sander Krause - <a
                href="https://madebysander.nl">MadeBySander</a>
        </p>
    </div>
    <!-- /.container -->
</footer>

<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/app.js"></script>

</body>
</html>
