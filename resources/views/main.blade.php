@extends('index')

@section('script')
    <link href="{{ url('/css/main.css') }}" rel="stylesheet">
@stop

@section('cabecalho')
    <nav class="lastTopics">
        <a href="{{ action('PostagemController@showPostagem', ['id' => $postagens[0]->id]) }}">
            <div class="larger" style="background-image: url({{ $postagens[0]->img1 }})">
                <h1>{{ $postagens[0]->titulo }}</h1>
            </div>
        </a>
        <a href="{{ action('PostagemController@showPostagem', ['id' => $postagens[1]->id]) }}">
            <div class="smallest1" style="background-image: url({{ $postagens[1]->img1 }})">
                <h1>{{ $postagens[1]->titulo }}</h1>
            </div>
        </a>
        <a href="{{ action('PostagemController@showPostagem', ['id' => $postagens[2]->id]) }}">
            <div class="smallest2" style="background-image: url({{ $postagens[2]->img1 }})">
                <h1>{{ $postagens[2]->titulo }}</h1>
            </div>
        </a>
    </nav>
@stop

@section('conteudo')
<nav class="lastNews">
  <div class="container-fluid">
    <ul class="nav navbar-nav lastNews" id="lastestNews">
      <li class="lastNews" id="lastestNews">
          <p>Últimos Tópicos</p>
      </li>
    </ul>
  </div>
  <div class="row">
      <?php $tag = ""; ?>
      @for($i = 3; $i < 14; $i++)
          <div class="gallery{{ $tag }}">
            <a href="{{ action('PostagemController@showPostagem', ['id' => $postagens[$i]->id]) }}">
              <img src="{{ $postagens[$i]->img1 }}">
            </a>
            <div class="desc{{ $tag }}">{{ $postagens[$i]->titulo }}</div>
          </div>
          @if($i == 5 || $i == 9) <?php $tag = 2; ?>
  </div>
  <div class="row">
        @endif
      @endfor
  </div>
</nav>
<form action="" method="POST">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type ="hidden" name="cadastrar" value="C">
    <h3 class="getInTouch">Newsletter</h3>

    <div class="row">
        <div class="col-sm-4">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <input type="text" class="form-control" name="text" placeholder=" Nome">
            </div>
        </div>
         <div class="col-sm-4">
             <div class="input-group">
                 <span class="input-group-addon">
                     <i class="glyphicon glyphicon-envelope"></i>
                 </span>
                 <input type="text" class="form-control" name="email" placeholder=" E-mail">
             </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </div>
    <br>
</form>
@stop
