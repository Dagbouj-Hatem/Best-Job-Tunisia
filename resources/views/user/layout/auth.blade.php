<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Best Job Login</title> 
    <link rel="stylesheet" type="text/css" href="{!! asset('User/css/stylee.css') !!}">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{!! asset('User/css/bootstrap.min.css') !!}">
    <link rel="shortcut icon" href="{{{ asset('User/images/login.png') }}}">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center">
            

<div class="background">
    <video autoplay="true" loop="loop" preload="auto" id="vid" muted="muted" >
        <source src="{!! asset('User/videos/Ipad.MP4') !!}" type="video/mp4">
    </video>
</div>
   
<div class="center-container">
      
     @yield('content')
</div>
<!--footer 
<div class="footer">
    <b><p align="center"  style=" color : black ; margin-top:-40px !important; position: relative;">&copy; 2018  All rights reserved | Design by BETTAIB Ghaith</p></b>
</div>
<!//footer-->


        </div>
    </div>
</div>
</body>
</html>