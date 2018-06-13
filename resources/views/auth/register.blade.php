@extends('index')

@section('script')
    <link href="{{ url('/css/login.css') }}" rel="stylesheet">
@stop

@section('cabecalho')
@stop

@section('conteudo')
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <h3 class="loginLb">Sign up</h3>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                    <input id="name" type="text" class="form-control" name="name" placeholder=" Nome" value="{{ old('name') }}" required autofocus>
                </div>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </span>
                    <input id="email" type="email" class="form-control" name="email" placeholder=" E-mail" value="{{ old('email') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                    </span>
                    <input id="password" type="password" class="form-control" name="password" placeholder=" Senha" required>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                    </span>
                    <input id="password-confirm" type="password" class="form-control" placeholder=" Confirmar senha" name="password_confirmation" required>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-block">Sign-up</button>
        </div>
    </div>
</form>
@endsection
