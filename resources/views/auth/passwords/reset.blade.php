@extends('index')

@section('script')
    <link href="{{ url('/css/login.css') }}" rel="stylesheet">
    <link href="{{ url('/css/reset.css') }}" rel="stylesheet">
@stop

@section('cabecalho')
@stop

@section('conteudo')
    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <h3 class="loginLb">Resetar senha</h3>

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </span>
                    <input id="email" type="email" class="form-control" name="email" placeholder=" E-mail" value="{{ $email or old('email') }}" required autofocus>
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
      <div class="row">
          <div class="col-md-6">
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="glyphicon glyphicon-lock"></i>
                  </span>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder=" Confirmar Senha" required>
              </div>
              @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
              @endif
         </div>
     </div>
     <div class="row events">
         <div class="col-md-6">
             <button type="submit" class="btn btn-success btn-block">Reset</button>
         </div>
     </div>
</form>
@endsection
