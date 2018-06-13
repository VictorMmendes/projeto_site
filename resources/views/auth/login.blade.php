@extends('index')

@section('script')
    <link href="{{ url('/css/login.css') }}" rel="stylesheet">
@stop

@section('cabecalho')
@stop

@section('conteudo')
<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <h3 class="loginLb">Sign-in</h3>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </span>
                    <input id="email" type="email" class="form-control" name="email" placeholder=" E-mail" value="{{ old('email') }}" required autofocus>
                </div>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-4">
               <div class="input-group">
                   <span class="input-group-addon">
                       <i class="glyphicon glyphicon-lock"></i>
                   </span>
                   <input id="password" type="password" class="form-control" name="password" placeholder=" Senha" required>
               </div>
           </div>
       </div>

       @if ($errors->has('email'))
           <span class="help-block">
               <strong>{{ $errors->first('email') }}</strong>
           </span>
       @else
           <span class="help-block"><br></span>
       @endif

   </div>
   <div class="events">
        <div class="row">
            <div class="col-sm-2">
                <div>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Lembrar de mim
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-success btn-block">Login</button>
            </div>
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Esqueceu a senha?
            </a>
        </div>
    </div>
    <br>
</form>
@endsection
