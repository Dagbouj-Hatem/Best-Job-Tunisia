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
    <title>Entreprise Login - Best Job</title>
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
        <form class="login-form" method="POST" action="{{ url('/entreprise/password/email') }}">
             {{ csrf_field() }}
           <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Mot de passe oublier</h3>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="text" placeholder="Email" autofocus>
          </div> 
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"  type="submit">Rénisialiser</button> 
          </div>
          <div class="form-group" style="margin-top: 20px;">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <p class="semibold-text mb-2"><a href="{{ url('entreprise/login') }}" data-toggle="flip">Login</a></p>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="{{ url('entreprise/register') }}" data-toggle="flip">Inscription</a></p> 
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

