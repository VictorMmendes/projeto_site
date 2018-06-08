@extends('index')

@section('script')
    <link href="{{ url('/css/main.css') }}" rel="stylesheet">
@stop

@section('cabecalho')
    <nav class="lastTopics">
        <a href="#">
            <div class="larger" style="background-image: url('https://i.pinimg.com/originals/2e/f7/30/2ef7307d3ab739f8c8ad2e71480c138f.jpg')">
                <h1>Origin: Ice Kingdom</h1>
            </div>
        </a>
        <a href="#">
            <div class="smallest1" style="background-image: url('https://i.kinja-img.com/gawker-media/image/upload/t_original/h65c5z5dpu1hzgct7f5j.jpg')">
                <h1>Transformers: The End</h1>
            </div>
        </a>
        <a href="#">
            <div class="smallest2" style="background-image: url('https://media.playstation.com/is/image/SCEA/god-of-war-screen-03-ps4-us-13jun16?$MediaCarousel_Original$')">
                <h1>God Of War II</h1>
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
      <div class="gallery">
        <a target="_blank" href="img_fjords.jpg">
          <img src="https://c.s-microsoft.com/pt-br/CMSImages/Windows-10-Games-E3_Content-Placement-1083_Acorn_485x273.jpg?version=364abed8-d81d-c126-1c2a-b4442b8eef36">
        </a>
        <div class="desc">Super Lucky Tale, O Crash da microsoft</div>
      </div>

      <div class="gallery">
        <a target="_blank" href="img_forest.jpg">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDXC6OsSVsBgQ0KZew-wbx9oFxORFzlCx2XrwUV51NQh4qCjh5pw">
        </a>
        <div class="desc">Call Of Duty - Infinite Warfare</div>
      </div>

      <div class="gallery">
        <a target="_blank" href="img_lights.jpg">
          <img src="https://wallpapercave.com/wp/wp2208669.png">
        </a>
        <div class="desc">Playersnknown's Battlegrounds melhora ainda mais os gráficos</div>
      </div>
  </div>
  <div class="row">
      <div class="gallery2">
        <a target="_blank" href="img_fjords.jpg">
          <img src="https://steamcdn-a.akamaihd.net/steam/apps/346110/capsule_616x353.jpg?t=1527054825">
        </a>
        <div class="desc2">ARK - Survival Evolved</div>
      </div>
      <div class="gallery2">
        <a target="_blank" href="img_forest.jpg">
          <img src="http://www.conexaonerdeste.com/wp-content/uploads/2017/09/games.jpg">
        </a>
        <div class="desc2">The Mario Cart Evolution</div>
      </div>

      <div class="gallery2">
        <a target="_blank" href="img_lights.jpg">
          <img src="https://vignette.wikia.nocookie.net/dcuo/images/7/72/262522.jpg/revision/latest?cb=20130815162316&path-prefix=ru">
        </a>
        <div class="desc2">The Batman - Injustice</div>
      </div>

      <div class="gallery2">
        <a target="_blank" href="img_mountains.jpg">
          <img src="http://sm.ign.com/ign_br/video/3/39-big-pc-/39-big-pc-games-coming-in-2017_u3dz.jpg">
        </a>
        <div class="desc2">The Warrior of Darkness</div>
      </div>
  </div>
  <div class="row">
      <div class="gallery2">
        <a target="_blank" href="img_fjords.jpg">
          <img src="https://timeline.canaltech.com.br/280196.700/games-with-gold-confira-os-jogos-gratuitos-de-abril-para-o-xbox-111172.jpg">
        </a>
        <div class="desc2">Assassin's Creed - Serial Killers Avengers</div>
      </div>
      <div class="gallery2">
        <a target="_blank" href="img_forest.jpg">
          <img src="https://jovemnerd.com.br/wp-content/uploads/2018/02/the-division-760x428.jpg">
        </a>
        <div class="desc2">The division - Fire war no end</div>
      </div>

      <div class="gallery2">
        <a target="_blank" href="img_lights.jpg">
          <img src="https://media.wired.com/photos/5a3844e629585a33ddc8578a/master/pass/BestGames-FINAL.jpg">
        </a>
        <div class="desc2">Red Dead Redemption 2</div>
      </div>

      <div class="gallery2">
        <a target="_blank" href="img_mountains.jpg">
          <img src="http://images.pushsquare.com/news/2017/04/feature_the_20_best_rpgs_on_ps4/attachment/2/900x.jpg">
        </a>
        <div class="desc2">Templary Knights II</div>
      </div>
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
