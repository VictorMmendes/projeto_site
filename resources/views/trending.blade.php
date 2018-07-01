@extends('index')

@section('script')
    <link href="{{ url('/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('/css/trending.css') }}" rel="stylesheet">
@stop

@section('cabecalho')
    <form action="{{ action('PostagemController@trending') }}" method="get">
        <div class="row">
            <div class="col-md-4">
                <input type="date" class="btn-block" name="inicial" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-4">
                <input type="date" class="btn-block" name="final" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success btn-block">Filtrar</button>
            </div>
        </div>
    </form>
    <div id='lava_div' style='border:1px solid black'>
        <?php echo $lava->render($tipo, 'Dados', 'lava_div'); ?>
    </div>
@stop

@section('conteudo')

@stop
