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
    .w3-col.l6 {
        width: 100%;
        margin-top: 50px;
    }
    img{
        width: 100%;
    }
</style>
<body>
<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
        <a href="#home" class="w3-bar-item w3-button">Gourmet au Catering</a>
        <!-- Right-sided navbar links. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="#about" class="w3-bar-item w3-button">About</a>
            <a href="#menu" class="w3-bar-item w3-button">Menu</a>
            <a href="#contact" class="w3-bar-item w3-button">Contact</a>
            @if(Session::has('id'))
            @else
                <a class="w3-bar-item w3-button" href="/login">Login</a>
            @endif
            @if(Session::has('id'))
            @else
                <a class="w3-bar-item w3-button" href="/logout">logout</a>
            @endif
        </div>
    </div>
</div>
    <div class="w3-col l6 w3-padding-large">
        <h1>{!! $detail->blogName !!}</h1>
        <p>Ngày: {!! $detail->created_at !!}</p>
        <p>{!! $detail->blogInf !!}</p>
        <p>{!! $detail->userName !!}</p>
        <img src="/image/{!! $detail->blogPicture !!} ">
{{--        <p>{{ dd($detail->blogContent) }}</p>--}}
        <p>{!!$detail->blogContent !!}</p>
        <p>{!! $detail->categoryName !!}</p>
    </div>
</body>
