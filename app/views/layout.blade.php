<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-touch-icon-152x152.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-TileImage" content="{{ asset('mstile-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

	<title>{{ $title or '' }}Malarrimo</title>

    <meta name="description" content="{{ $description or '' }}">

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    {{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/main.css') }}

    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    @yield('appendHead')

</head>
<body>

    <header class="site-header {{ $headerClass or '' }}">
        <div class="content">

            <ul class="top-bar clearfix">
                <li class="top-bar-hidden">Guerrero Negro B.C.S México</li>
                <li class="top-bar-hidden">-</li>
                <li class="top-bar-hidden"><time datetime="">{{ $currentTime }}</time></li>
                <li class="top-bar-hidden">-</li>
                <li><span class="weather">{{ $currentTemp->getTempFahrenheit() }}°F / {{ $currentTemp->getTempCelsius() }}°C</span></li>
                <li><a href="https://www.facebook.com/pages/wwwmalarrimocom/250015779122" class="top-icon fb-top-icon" target="_blank"></a></li>
                <li><a href="https://twitter.com/EtoursMalarrimo" class="top-icon tw-top-icon" target="_blank"></a></li>
                <li><a href="/en" class="language-switch {{ $language == 'en' ? 'active-language' : '' }}">Eng</a></li>
                <li>|</li>
                <li><a href="/" class="language-switch {{ $language == 'es' ? 'active-language' : '' }}">Esp</a></li>
            </ul>

            <a href="{{ route('home') }}" title="Malarrimo" class="logo">
                <img src="{{ URL::asset('img/logo.png') }}" width="150" height="150" alt="Malarrimo">
            </a>

            <nav>
                <!--<a href="#"><span class="glyphicon glyphicon-menu-hamburger"></span></a>-->
                <ul class="main-menu">
                    <li {{ Route::currentRouteName() == 'home' ? 'class="main-menu-active"' : '' }}>
                        <a href="{{ route('home') }}">{{ Lang::get('layout.home') }}</a>
                    </li>
                    <li {{ Route::currentRouteName() == 'location' || Route::currentRouteName() == 'briefHistory'
                            ? 'class="main-menu-active"' : '' }}>
                        <a href="{{ route('location') }}">{{ Lang::get('layout.location') }}</a>
                    </li>
                    <li {{ Route::currentRouteName() == 'malarrimo' || Route::currentRouteName() == 'ecoTours'
                            || Route::currentRouteName() == 'restaurant' || Route::currentRouteName() == 'motel'
                            || Route::currentRouteName() == 'rvparking' || Route::currentRouteName() == 'casaelviejocactus'
                            || Route::currentRouteName() == 'deli'
                            ? 'class="main-menu-active"' : '' }}>
                        <a href="{{ route('malarrimo') }}">{{ Lang::get('layout.facilities') }}</a>
                    </li>
                    <li {{ Route::currentRouteName() == 'tours' || Route::currentRouteName() == 'equipment'
                            || Route::currentRouteName() == 'fees' || Route::currentRouteName() == 'whales'
                            || Route::currentRouteName() == 'otherTours' || Route::currentRouteName() == 'otherFees'
                            ? 'class="main-menu-active"' : '' }}>
                        <a href="{{ route('tours') }}">{{ Lang::get('layout.tours') }}</a>
                    </li>
                    <li {{ Route::currentRouteName() == 'booking' || Route::currentRouteName() == 'bookingConfirmation'
                            ? 'class="main-menu-active"' : '' }}>
                        <a href="{{ route('booking') }}">{{ Lang::get('layout.booking') }}</a>
                    </li>
                    <li {{ Route::currentRouteName() == 'news' || Route::currentRouteName() == 'post'
                        ? 'class="main-menu-active"' : '' }}>
                        <a href="{{ route('news') }}">{{ Lang::get('layout.news') }}</a>
                    </li>
                    <li {{ Route::currentRouteName() == 'galleries' ? 'class="main-menu-active"' : '' }}>
                        <a href="{{ route('galleries') }}">{{ Lang::get('layout.galleries') }}</a>
                    </li>
                    <li {{ Route::currentRouteName() == 'contact' ? 'class="main-menu-active"' : '' }}>
                        <a href="{{ route('contact') }}">{{ Lang::get('layout.contact') }}</a>
                    </li>
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
                <a class="twitter-timeline" href="https://twitter.com/EtoursMalarrimo" data-widget-id="627722589570363393">@Malarrimo {{ Lang::get('layout.twitterSays') }}:</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="column-3 column-facebook">
                <div class="column-icon fb-widget-icon"></div>
                <div class="fb-like-box" data-href="https://www.facebook.com/pages/wwwmalarrimocom/250015779122" data-width="220" data-height="446" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
            </div>
            <div class="column-3 column-whales">
                <div class="column-icon whale-tail-icon"></div>
                <a href="{{ route('booking') }}">
                    <img src="{{ URL::asset('img/bann-avistamiento.jpg') }}" alt="Avistamiento de ballena gris"/>
                </a>
            </div>
        </div>

        <div class="bottom-bar">
            <div class="content">
                <small>Malarrimo &centerdot; {{ Lang::get('layout.copyright') }}</small>
            </div>
        </div>
    </footer>

    @yield('scripts')

    <!-- Google plus script -->
    <script type="text/javascript">
        window.___gcfg = {lang: 'es-419'};
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/platform.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>

    <!-- Facebook script -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=250086971679898&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Google analytics script -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-67487239-1', 'auto');
      ga('send', 'pageview');

    </script>

</body>
</html>
