<!DOCTYPE HTML>
<html>
<head>
<title>Best Job</title>
<link rel="icon" type="image/png" href="{{{ asset('FrontEnd/images/icon.png') }}}" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{!! asset('FrontEnd/css/bootstrap-3.1.1.min.css') !!}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{!! asset('FrontEnd/js/jquery.min.js') !!}"></script>
<script src="{!! asset('FrontEnd/js/bootstrap.min.js') !!}"></script>
<!-- Custom Theme files -->
<link href="{!! asset('FrontEnd/css/style.css') !!}" rel='stylesheet' type='text/css' />
<link href='https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!-- font-Awesome -->
<link href="{!! asset('FrontEnd/css/font-awesome.css') !!}" rel="stylesheet"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- font-Awesome -->
</head>
<body>
<nav class="navbar navbar-default " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('/'); !!}"><img src="FrontEnd/images/logo.png" alt=""/></a>
        </div>
        <!--/.navbar-header-->
        <div class="navbar-collapse collapse " id="bs-example-navbar-collapse-1" style="height: 1px;">
            <ul class="nav navbar-nav "> 
                <li><a href="{!! url('/offres'); !!}"><i class="fa fa-list-ul" style="margin-right: 5px;"></i>Offres</a></li>
                <li><a href="{!! url('/formations'); !!}"><i class="fa fa-certificate" style="margin-right: 5px;"></i>Formations</a></li>
                <li><a href="{!! url('user/login/') !!}"><i class="fa fa-users" style="margin-right: 5px;"></i>Espace Condidat</a></li>
                <li><a href="{!! url('entreprise/login/') !!}"><i class="fa fa-briefcase" style="margin-right: 5px;"></i>Espace Entreprise</a></li> 
                <li><a href="{!! url('/apropos'); !!}"><i class="fa fa-info-circle" style="margin-right: 5px;"></i>À propos</a></li>

            </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
        <!--/.navbar-collapse-->
    </nav>
<div class="banner_1">
    <div class="container">
        <div id="search_wrapper1">
           <div id="search_form" class="clearfix">
            <h1 style="margin-top: 50px;" class="">Start Your Job Search</h1> 
           </div>
        </div>
   </div> 
</div>  


  @yield('content')


<div class="footer_bottom"> 
  <div class="container">  
    <div class="copy">
        <p>Copyright © 2018 - All Rights Reserved . Design by <a href="https://www.facebook.com/hatem.dag.7127" target="_blank">DAGBOUJ Hatem</a> </p>
    </div>
  </div>
</div>
<script type="text/javascript">
    
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.jb_1 , .jb_2').select2();


});
</script>
</body>
</html> 