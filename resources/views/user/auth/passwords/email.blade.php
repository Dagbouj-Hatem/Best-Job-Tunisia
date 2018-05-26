@extends('user.layout.auth')

<!-- Main Content -->
@section('content')

<div class="main-content">
        <div class="box">
            <div class="text-center " style="padding-top: 50px; margin-bottom: 50px; color :white;">
                <h2 class="text-upercase" >Rénisialiser password</h2>
            </div>
            <form role="form" method="POST" action="{{ url('/user/password/email') }}" lass="form-horizontal">
                 {{ csrf_field() }}
                 <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                         
                <input type="text" placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus class="form-control">
                <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span> 
            </div>
                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <p>{{ $errors->first('email') }}</p>
                                    </span>
                                @endif
                <br><br>
                 <input type="submit" name="" value="Rénisialiser" class="btn btn-primary text-center" style="margin-top: 10px !important;margin-bottom: 40px;">
                   
                <div class="label2" style="margin-top: 0px; padding-bottom: 20px;">
                    <h6><a href="{{ url('/user/register') }}">Vous n’avez pas de compte ?<i> Inscrivez-vous</i></a></h6>
                    <h6><a href="{{ url('/user/login') }}">Login<i> Cliquez ici</i></a></h6>
                </div> 
            </form>
        </div>
</div>


@endsection
