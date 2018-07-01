@extends('index')

@section('script')
    <link href="{{ url('/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('/css/newPost.css') }}" rel="stylesheet">
    <script type="text/javascript">
    function bs_input_file() {
            $(".input-file").before(
                function() {
                    if ( ! $(this).prev().hasClass('input-ghost') ) {
                        var element = $("<input type='file' accept='.txt' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name", $(this).attr("name"));
                        element.change(function(){
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function(){
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function(){
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                        });
                        $(this).find('input').css("cursor","pointer");
                        $(this).find('input').mousedown(function() {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }

        $(function() {
            bs_input_file();
        })
    </script>
@stop

@section('cabecalho')

@stop

@section('conteudo')
<div class="row">
    <div class="col-md-8 download">
        <a href="{{ url('txt/Post_model.txt') }}" target="_blank" download>Modelo<span class="glyphicon glyphicon-file"></span><a>
    </div>
</div>
<form action="{{ action('PostagemController@createPost') }}" method="POST" enctype="multipart/form-data">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="input-group input-file" name="arq_post">
                <span class="input-group-btn">
                <button class="btn btn-success btn-choose" type="button">Selecionar</button>
                </span>
                <input type="text" class="form-control" placeholder='Nenhum arquivo .txt selecionado...' />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <button type="submit" class="btn btn-success btn-block" id="enviar">Postar</button>
        </div>
    </div>
</form>
@stop
