@extends('user.layout.auth')

@section('content')
 <div class="main-content">
            <div class="box">
                <div class="panel-heading" style="padding-top: 50px; margin-bottom: 50px; color : white;"><h1>INSCRIPTION</h1> </div>

                <div class="panel-body" align="center">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                         

                            <div>
                                <input placeholder="Nom" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="form-control">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                         

                            <div >
                                <input placeholder=" Email" id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          

                            <div>
                                <input placeholder="Mot de passe" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            

                            <div>
                                <input placeholder="Confirmer mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group" >
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" style="margin-top: 10px;">
                                Inscription
                                </button>
                            </div>
                        </div>
                        <div class="row" align="center">
                            <a  href="{{ url('user/password/reset') }}" class="col-lg-12 text-center text-info h5 ">Rénisialiser mot de passe</a>
                        </div>
                        <div class="row text-center" align="center">
                            <a  href="{{ url('user/login') }}" class="col-lg-12 text-center text-info h5">Login</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <!--style type="text/css">
    .form-control{
        padding-top: 10px;
        margin-top: 20px; 
    }
    .btn-success{
        margin-top: 10px;
    }
    .footer{
        margin-top: 50px !important;
    }
</style>
<div class="main-content text-center">
        <div class="box" style="margin-top: -30px;">
            <div class="text-center" style="padding-top: 50px; margin-bottom: 50px; color : white;">
                <h2 class="text-upercase" >INSCRIPTION</h2>
            </div>
    <form class="form-vertical" role="form" method="POST" action="{{ url('/user/register') }}">
                        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12 " align="center">
                <input type="text" name="" class="form-control" name="name" placeholder="Votre nom ici">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-12 " align="center">
                <input type="text" name="" class="form-control" name="email" placeholder="Votre E-mail ici">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
        </div> 
         <div class="row">
            <div class="col-lg-12 " align="center">
                <input type="password" name="" class="form-control" name="password" placeholder="Votre mot de passe ici">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>
        </div> 
         <div class="row">
            <div class="col-lg-12 " align="center">
                <input type="password" name="" class="form-control" name="password_confirmation" placeholder="Confirmer votre mot de passe ici">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
            </div>
        </div> 
         <div class="row">
            <div class="col-lg-12 " align="center">
                 <div class="form-group">
                            <div class="col-lg-6  ">
                                <button type="submit" class="btn btn-success">
                                    Enregisterer
                                </button>
                            </div>
                 </div>
            </div>
        </div> 
        
    </form>

</div--> 
@endsection
