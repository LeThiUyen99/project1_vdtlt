<!DOCTYPE html>
<html>
<title>Blog Beauty</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    body {font-family: "Times New Roman", Georgia, Serif;}
    h1, h2, h3, h4, h5, h6 {
        font-family: "Playfair Display";
        letter-spacing: 5px;
    }
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
        <a href="#home" class="w3-bar-item w3-button">Gourmet au Catering</a>
        <!-- Right-sided navbar links. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <form style="float: left; margin-top: 5px" class="card-body" action="/search" method="GET" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." name="q">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">search</button>
                    </span>
                </div>
            </form>
            <a href="#about" class="w3-bar-item w3-button">About</a>
            <a href="#menu" class="w3-bar-item w3-button">Menu</a>
            @if(Session::has('id'))
            <a href="/post" class="w3-bar-item w3-button">Post</a>
            @else
            @endif
            <a href="#contact" class="w3-bar-item w3-button">Contact</a>
            @if(Session::has('id'))

                <a class="w3-bar-item w3-button" href="/logout">logout</a>
            @else
            <a class="w3-bar-item w3-button" href="/login">Login</a>
            @endif
        </div>
    </div>
</div>

<!-- Header -->
@include('layer.header')

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        @include('layer.about')
    </div>

    <hr>

    <!-- Menu Section -->
    <div class="w3-row w3-padding-64" id="menu">
        @yield('content')

        <div class="w3-col l6 w3-padding-large">
            @yield('cate')
{{--            <img src="/w3images/tablesetting.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">--}}
        </div>
    </div>

    <hr>

    <!-- Contact Section -->
{{--    <div class="w3-container w3-padding-64" id="contact">--}}
{{--        <h1>Contact</h1><br>--}}
{{--        <p>We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste. Do not hesitate to contact us.</p>--}}
{{--        <p class="w3-text-blue-grey w3-large"><b>Catering Service, 42nd Living St, 43043 New York, NY</b></p>--}}
{{--        <p>You can also contact us by phone 00553123-2323 or email catering@catering.com, or you can send us a message here:</p>--}}
{{--        <form action="/action_page.php" target="_blank">--}}
{{--            <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>--}}
{{--            <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="People"></p>--}}
{{--            <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>--}}
{{--            <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>--}}
{{--            <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>--}}
{{--        </form>--}}
{{--    </div>--}}

    <!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
    <p><a href="/" title="W3.CSS" target="_blank" class="w3-hover-text-green">My Blog Beauty</a></p>
</footer>

</body>
</html>
