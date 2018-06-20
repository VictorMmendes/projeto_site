@extends('index')

@section('script')
    <link href="{{ url('/css/postagem.css') }}" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#comentario").keyup(function(event)
            {
                const count = $("#comentario").val().length;
                if(count > 0)
                {
                    $("#submitComentario").css("display", "block");
                } else {
                    $("#submitComentario").css("display", "none");
                }
            });
        });

        function showReply(id)
        {
            var visib = document.getElementById("div_" + id).offsetHeight;
            if(visib == 0)
            {
                document.getElementById("div_" + id).style.display = "block";
                document.getElementById("span_" + id).classList.remove('glyphicon-chevron-up');
                document.getElementById("span_" + id).classList.add('glyphicon-chevron-down');
            } else {
                document.getElementById("div_" + id).style.display = "none";
                document.getElementById("span_" + id).classList.remove('glyphicon-chevron-down');
                document.getElementById("span_" + id).classList.add('glyphicon-chevron-up');
            }
        }
    </script>
@stop

@section('cabecalho')
<?php $date = new DateTime($postagem->publish_date); ?>
<nav class="postagem">
    <div class="postagem" style="background-image: url({{ $postagem->img1 }})">
    <h2>Comente e compartilhe</h2>
    <h1>{{ $postagem->titulo }}</h1>
    <h3><span class="glyphicon glyphicon-time time"></span>{{ $date->format('Y/m/d H:i:s') }}<h3>
</nav>
@stop

<?php
    $descr = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. \n\n";
?>

@section('conteudo')
<div class="row">
        <div class="post_content col-sm-4">
            <?= nl2br($descr) ?>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <br><br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <br><br>
            <figure>
                <img class="second_img" src="https://www.rockstargames.com/rockstar_games/games/img/screens/241-3.jpg">
                <figcaption>Fig.1 - Descricao descricao descricao.</figcaption>
            </figure>
            <br><br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <br><br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="col-sm-2 trending_row">
            <h3>Recentes</h3>
            @for($i = 0; $i < 7; $i++)
            <div class="row">
                <a href="{{ action('PostagemController@showPostagem', ['id' => $trendings[$i]->id]) }}">
                    <figure class="trending">
                        <img class="trending_img" src="{{ $trendings[$i]->img1 }}">
                        <figcaption>{{ $trendings[$i]->titulo }}</figcaption>
                    </figure>
                </a>
            </div>
            @endfor
        </div>
</div>
<h3 class="verMais_content">Veja mais</h3>
<div class="row verMais_content">
    @for($i = 7; $i < 13; $i++)
        <a href="{{ action('PostagemController@showPostagem', ['id' => $trendings[$i]->id]) }}">
            <div class="col-sm-2 veja_mais">
                <figure class="trending">
                    <img class="trending_img" src="{{ $trendings[$i]->img1 }}">
                    <figcaption class="veja_mais">{{ $trendings[$i]->titulo }}</figcaption>
                </figure>
            </div>
        </a>
        @if($i == 9 || $i == 12)
</div>
<div class="row verMais_content">
        @endif
    @endfor
</div>
<div class="row comentario_panel">
  <ul class="comentarios">
    <li class="comentarios">
        <p>Comentários</p>
    </li>
  </ul>
  <div class="comentarios">
      <form method="POST" action="{{ action('PostagemController@addComment', ['id' => $postagem->id]) }}">
          <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
          <div class="row currentUser">
              <img src="https://image.freepik.com/free-photo/grunge-metal-plates-on-an-old-watercolour-background_1048-6388.jpg">
              <div class="singleComentario">
                  <p class="userName">
                      <strong>
                          @if(Auth::check())
                          {{ Auth::user()->name }}
                          @else
                          Username
                          @endif
                      </strong>
                  </p>
                  <p class="currentUser">
                      <textarea maxlength="250" placeholder="Deixe seu comentário..." name="comentario" id="comentario"></textarea>
                      <button type="submit" id="submitComentario"><span class="glyphicon glyphicon-ok"></span></button>
                  </p>
              </div>
          </div>
      </form>
      @foreach($comentarios as $comentario)
          <div class="row">
              <img src="https://image.freepik.com/free-photo/grunge-metal-plates-on-an-old-watercolour-background_1048-6388.jpg">
              <div class="singleComentario">
                  <p class="userName"><strong>{{ $comentario->userName }}</strong>&bull; {{ $comentario->publish_date }}</p>
                  <p class="userComentario">{{ $comentario->conteudo }}</p>
                  <div class="comentariosEventos">
                      <span id="span_{{ $comentario->id }}" class="glyphicon glyphicon-chevron-up" onclick="showReply({{ $comentario->id }})"></span>
                      <span class="glyphicon glyphicon-edit" onclick="showReply({{ $comentario->id }})"></span>
                      <span class="glyphicon glyphicon-share-alt"></span>
                  </div>

                  <div class="replies" id="div_{{ $comentario->id }}">
                  @foreach($replies[$comentario->id] as $reply)
                      <img src="https://image.freepik.com/free-photo/grunge-metal-plates-on-an-old-watercolour-background_1048-6388.jpg">
                      <p class="userName"><strong>{{ $reply->userName }}</strong>&bull; {{ $reply->publish_date }}</p>
                      <p class="userComentario">{{ $reply->conteudo }}</p>
                  @endforeach
                  </div>
              </div>
          </div>
      @endforeach
  <div>
</div>
@stop
