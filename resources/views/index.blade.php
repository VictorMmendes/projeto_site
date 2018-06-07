<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TecGames - Explore os universos</title>
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
                </h3>
            </div>
          <div class="container-fluid mainDiv">
            <ul class="nav navbar-nav mainUl">
            <li class="inactive">
                <p></p>
            </li>
              <li>
                  <a href="#"><p>Home</p></a>
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

                <div class="page-header">
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
