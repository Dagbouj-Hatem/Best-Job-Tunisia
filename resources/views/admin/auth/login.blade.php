<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('admin/css/main.css') !!}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Login - Best Job</title>
   <link rel="icon" type="image/icon" href="https://cdn1.iconfinder.com/data/icons/mobile-device/512/settings-option-configurate-gear-blue-round-512.png">
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Best Job</h1>
      </div>

      <div class="login-box">
        <form class="login-form" method="POST" action="{{ url('/admin/login') }}">
             {{ csrf_field() }}
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Authentification</h3>
          <div class="form-group">
            <label class="control-label">E-mail</label>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" placeholder="Votre E-mail ici" name="email" required  autofocus value="{{ old('email') }}" >
          </div>
          <div class="form-group">
            <label class="control-label">Mot de passe</label>
            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" placeholder="Votre mot de passe ici" name="password" required value="{{ old('password') }}">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Connexion</button> 
          </div>
          <div class="form-group" style="margin-top: 20px;">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <p class="semibold-text mb-2 text-center"><a href="{{ url('admin/password/reset') }}" data-toggle="flip">Mot de passe oublier?</a></p>
                </label>
              </div> 
            </div>
          </div>
          
        </form>

        
        
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{!! asset('admin/js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! asset('admin/js/popper.min.js') !!}"></script>
    <script src="{!! asset('admin/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('admin/js/main.js') !!}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{!! asset('admin/js/plugins/pace.min.js') !!}"></script>
    
  </body>
</html>

