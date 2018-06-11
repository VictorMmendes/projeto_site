@extends('index')

@section('script')
    <link href="{{ url('/css/postagem.css') }}" rel="stylesheet">
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

@section('conteudo')

@stop
