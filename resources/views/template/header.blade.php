<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title')</title>
    <link href={{ URL::asset("css/dist/css/materialize.css")}} rel="stylesheet" />    
    <link href={{ URL::asset("css/style.css")}} rel="stylesheet" />    
</head>
<body>
    <header>
        <div class="navbar--middle">
            <div>
                <h1><a class="white-color" href="/">Pizzaïlo</a></h1>
            </div>
            <ul class="menu-right">
                <li><a href="#pizza">Nos pizzas</a></li>
                <li>A propos</li>                
                <li>05 52 45 86 96</li>
            </ul>
        </div>
    </header>   
    
    @yield('content')
    <script src={{ URL::asset("css/dist/js/jquery.js")}}></script>
    <script src={{ URL::asset("css/dist/js/materialize.js")}}></script>
    <script>
        $('.carousel.carousel-slider').carousel({fullWidth: true});
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
</body>
</html>