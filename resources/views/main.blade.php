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
            <div class="smallest2" style="background-image: url('https://www.psu.com/app/uploads/2018/04/god-of-war-ps4-wallpaper4-1.jpg')">
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
  <div class="gallery">
    <a target="_blank" href="img_fjords.jpg">
      <img src="https://c.s-microsoft.com/pt-br/CMSImages/Windows-10-Games-E3_Content-Placement-1083_Acorn_485x273.jpg?version=364abed8-d81d-c126-1c2a-b4442b8eef36" alt="Trolltunga Norway" width="300" height="200">
    </a>
    <div class="desc">Super Lucky Tale, O Crash da microsoft</div>
  </div>

  <div class="gallery">
    <a target="_blank" href="img_forest.jpg">
      <img src="https://lh3.googleusercontent.com/BMl0z1JtnbTkioqSjtnyWnqc7k_4l0zn1_c6PlyIo4mUYjwnAGXwAsPdEqK3emIhKr0=w720-h310" alt="Forest" width="600" height="400">
    </a>
    <div class="desc">Game Warrior concorre com Clash of clans</div>
  </div>

  <div class="gallery">
    <a target="_blank" href="img_lights.jpg">
      <img src="http://static.businessinsider.com/image/5a9ec9f95cc41020058b4570-750.jpg" alt="Northern Lights" width="600" height="400">
    </a>
    <div class="desc">Playersnknown's Battlegrounds melhora ainda mais os gráficos</div>
  </div>

  <div class="gallery">
    <a target="_blank" href="img_mountains.jpg">
      <img src="https://cdn.vox-cdn.com/thumbor/Du--3kJT_wFTqFnjDXyPS_PxNwY=/0x0:1500x844/1200x0/filters:focal(0x0:1500x844)/cdn.vox-cdn.com/uploads/chorus_asset/file/8449505/darksiders_3_convo.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Polygon II surpreende com resolução 4k</div>
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
