@extends('index')

@section('script')
    <link href="{{ url('/css/login.css') }}" rel="stylesheet">
    <link href="{{ url('/css/reset.css') }}" rel="stylesheet">
@stop

@section('cabecalho')
@stop

@section('conteudo')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <h3 class="loginLb">Recuperar senha</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-envelope"></i>
                </span>
                <input id="email" type="email" class="form-control" name="email" placeholder=" E-mail" value="{{ old('email') }}" required>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
       </div>
   </div>

    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-block">
                Send Password Reset Link
            </button>
        </div>
    </div>
</form>
@endsection
