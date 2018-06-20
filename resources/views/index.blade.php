<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TecGames - Explore os universos</title>
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ url('favicon/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ url('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ url('/css/index.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#purple").mouseover(function()
                {
                    $("#navegacao").css("background-color", "#cc0066");
                    $("#lastestNews li").css("border-top", "4px solid #cc0066");
                    $("#lastestNews p").css("color", "#cc0066");
                });

                $("#purple").mouseleave(function()
                {
                    $("#navegacao").css("background-color", "black");
                    $("#lastestNews li").css("border-top", "4px solid #404040");
                    $("#lastestNews p").css("color", "#404040");
                });

                $("#cinza").mouseover(function()
                {
                    $("#navegacao").css("background-color", "#56d556");
                    $("#lastestNews li").css("border-top", "4px solid #56d556");
                    $("#lastestNews p").css("color", "#56d556");
                });

                $("#cinza").mouseleave(function()
                {
                    $("#navegacao").css("background-color", "black");
                    $("#lastestNews li").css("border-top", "4px solid #404040");
                    $("#lastestNews p").css("color", "#404040");
                });
            });

        </script>
        @yield('script')
    </head>

    <body role="document">
        <nav class="navbar navbar-default mainNav" id="navegacao">
            <div class="container-fluid mainDiv">
                <h3>
                    <strong class="opac">TEC</strong><strong>GAMES</strong>
                    <img class="icone" src="{{ url('/img/gamepad.png') }}">
                    <ul class="nav navbar-nav auth">
                        @guest
                            <li>
                                <a href="{{ route('login') }}">
                                    Login <span class="glyphicon glyphicon-user"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">
                                    Register <span class="glyphicon glyphicon-plus-sign"></span>
                                </a>
                            </li>
                        @else
                            <div class="nav navbar-nav dropdown" style="margin-right: 40%">
                                <span style="color: white" class="dropdown-toggle">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-content">
                                    <li>
                                        @if(Auth::user()->admin)
                                        <a href="/newPost">
                                            Postar
                                        </a>
                                        @endif
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </div>
                            </div>
                        @endguest
                    </ul>
                </h3>
            </div>
          <div class="container-fluid mainDiv">
            <ul class="nav navbar-nav mainUl">
            <li class="inactive">
                <p></p>
            </li>
              <li>
                  <a href="{{ action('PostagemController@listar') }}"><p>Home</p></a>
              </li>
              <li>
                  <a href="#"><p>Trending</p></a>
              </li>
              <li id="purple">
                  <a href="#"><p>TecShopping</p></a>
              </li>
              <li id="cinza">
                  <a href="#"><p>Sobre</p></a>
              </li>
              <li class="inactive">
                  <p></p>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container theme-showcase" role="main">

            <div class="page-header float-up">

                <div class="page-header lastTopics">
                    @yield('cabecalho')
                </div>

                @yield('conteudo')
            </div>

            <div class="page-header foot">
                <p class="emailContact">TecGames@gmail.com</p>
                <p>
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </p>
                <p>&copy 2018 TECGAMES</p>
            </div>
        </div>
    </body>
</html>
