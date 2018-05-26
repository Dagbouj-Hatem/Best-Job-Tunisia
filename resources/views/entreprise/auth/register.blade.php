<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('entreprise/css/main.css') !!}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Inscription entreprise</title> 
    <link rel="icon" type="image/icon" href="https://cdn1.iconfinder.com/data/icons/mobile-device/512/settings-option-configurate-gear-blue-round-512.png">
  </head>
  <body class="container">
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Best Job</h1>
      </div>

      <div class="login-box" style="width: 600px; ">
        <form class="login-form" method="POST" action="{{ url('/entreprise/register') }}">
              {{ csrf_field() }}
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-plus"></i>Inscription</h3>
          <div class="row">
              <div class="col-lg-6">
                  <div class="form-group"> 
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" placeholder="Nom de l'entreprise" autofocus name="name" value="{{ old('name') }}">
                  </div>
                  <div class="form-group"> 
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" placeholder="Mot de passe" name="password" value="{{ old('password') }}">
                  </div>
                  <div class="form-group"> 
                    <input class="form-control {{ $errors->has('tele') ? 'is-invalid' : '' }}" type="text" placeholder="Téléphonne" name="tele" value="{{ old('tele') }}">
                  </div>
                   <div class="form-group">  
                    <textarea class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}"  placeholder="Adresse de l'entreprise" name="adresse" value="{{ old('adresse') }}"></textarea>
                  </div>
              </div>
              <div class="col-lg-6"> 
                <div class="form-group"> 
                  <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" placeholder="Email de l'entreprise"  name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group"> 
                  <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" placeholder="Confirmer le mot de passe" name="password_confirmation" value="{{ old('password_confirmation') }}">
                </div>
                <div class="form-group"> 
                  <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" placeholder="Fax" name="fax" value="{{ old('fax') }}">
                </div>
                 <div class="form-group"> 
                  <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description de l'entreprise" name="description" value="{{ old('description') }}"></textarea>
                </div>
              </div>
          </div>

          <div class="form-group">
            <div class="utility">
              <div class="form-group btn-container">
                <button class="btn btn-primary btn-block  mb-12"><i class="fa fa-sign-in fa-lg fa-fw"></i>Inscription</button>
              </div>
              <div class="animated-checkbox">
                <label> 
                  <p class="semibold-text mb-2"><a href="{{ url('entreprise/login') }}" data-toggle="flip">Login</a>
                </label>
              </div>
             <p class="semibold-text mb-2"><a href="{{ url('entreprise/password/reset') }}" data-toggle="flip">Mot de passe oublier?</a>
            </div>
          </div> 
        </form> 
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{!! asset('entreprise/js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! asset('entreprise/js/popper.min.js') !!}"></script>
    <script src="{!! asset('entreprise/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('entreprise/js/main.js') !!}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{!! asset('entreprise/js/plugins/pace.min.js') !!}"></script>
     
  </body>
</html>
