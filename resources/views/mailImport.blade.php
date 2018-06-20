<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $titulo }}</title>
    </head>
    <body>

        <img src="{{ $dados['postagem'] }}">
        <h3>{{ $dados['titulo'] }}</h3>
        <br/>

        <div class="page-header foot">
            <p class="emailContact">TecGames@gmail.com</p>
            <p>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-youtube"></a>
            </p>
            <p>&copy 2018 TECGAMES</p>
        </div>
    </body>
</html>
