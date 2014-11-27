<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title or '' }}Malarrimo</title>

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>

	{{ HTML::style('css/main.css') }}

</head>
<body>

    <header class="site-header {{ $headerClass or '' }}">
        <div class="content">
            <a href="" title="Malarrimo" class="logo">
                <img src="{{ URL::asset('img/logo.png') }}" width="150" height="150" alt="Malarrimo">
            </a>

            <ul class="top-bar clearfix">
                <li>Guerrero Negro B.C.S México</li>
                <li>-</li>
                <li><time datetime="">7:30 am</time></li>
                <li>-</li>
                <li><span class="weather">70°F / 30°C</span></li>
                <li><a href="" class="top-icon fb-top-icon"></a></li>
                <li><a href="" class="top-icon tw-top-icon"></a></li>
                <li><a href="" class="language-switch">Eng</a></li>
                <li>|</li>
                <li><a href="" class="language-switch active-language">Esp</a></li>
            </ul>

            <nav>
                <ul class="main-menu">
                    <li><a href="">Inicio</a></li>
                    <li><a href="">Ubicación</a></li>
                    <li class="main-menu-active"><a href="">Comodidades</a></li>
                    <li><a href="">Tours</a></li>
                    <li><a href="">Reservaciones</a></li>
                    <li><a href="">Noticias</a></li>
                    <li><a href="">Galería</a></li>
                    <li><a href="">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="main-content content clearfix">

        @yield('content')

    </section>

    <footer class="main-footer">
        <div class="content clearfix">
            <div class="column-3 column-twitter">
                <div class="column-icon tw-widget-icon"></div>
                <a class="twitter-timeline" href="https://twitter.com/Vallel" data-widget-id="537854074742255616">@Malarrimo dice:</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="column-3 column-facebook">
                <div class="column-icon fb-widget-icon"></div>
                <div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="220" data-height="446" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
            </div>
            <div class="column-3 column-whales">
                <div class="column-icon whale-tail-icon"></div>
                <img src="{{ URL::asset('img/bann-avistamiento.jpg') }}" alt="Avistamiento de ballena gris"/>
            </div>
        </div>

        <div class="bottom-bar">
            <div class="content">
                <small>Malarrimo &centerdot; Todos los derechos reservados</small>
            </div>
        </div>
    </footer>

    <!-- Facebook script -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=250086971679898&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>
