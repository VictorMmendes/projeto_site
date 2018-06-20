@extends('index')

@section('script')

@section('cabecalho')

@stop

@section('conteudo')
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body">
            <div class="{{ $tipo }}">
                <h4><strong>{{ $titulo }}</strong></h4>
                {{ $msg }}
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ $acao }}" type="button" class="btn btn-default">OK</a>
        </div>
    </div>
</div>
@stop
