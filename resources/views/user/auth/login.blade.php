@extends('user.layout.auth')

@section('content')

<div class="main-content">
        <div class="box">
            <div class="text-center " style="padding-top: 50px; margin-bottom: 50px; color :white;">
                <h2 class="text-upercase" >AUTHENTIFICATION</h2>
            </div>
            <form role="form" method="POST" action="{{ url('/user/login') }}">
                 {{ csrf_field() }}
                <input type="text" placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus class="form-control ">
                <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span> 
                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <p>{{ $errors->first('email') }}</p>
                                    </span>
                                @endif
                <br><br>
                <input  placeholder="Mot de passe" name="password" type="password" required="" class="form-control">
                <span class="icon2"><i class="fa fa-lock prefix" aria-hidden="true"></i></span>
                                 @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <p>{{ $errors->first('password') }}</p>
                                    </span>
                                @endif
                <br>
                <div class="label2">
                    <h6><a href="{{ url('/user/register') }}">Vous n’avez pas de compte ?<i> Inscrivez-vous</i></a></h6><h6><a href="{{ url('/user/password/reset') }}">Rénisialiser votre password<i> Cliquez ici</i></a></h6>
                    <input type="submit" name="" value="Connexion" class="btn btn-primary text-center" style="margin-top: 10px !important;margin-bottom: 40px;">
                   
                </div> 
            </form>
        </div>
</div>

@endsection
