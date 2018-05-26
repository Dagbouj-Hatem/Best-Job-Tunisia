<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="">
    <!-- Twitter meta-->
    <meta property="twitter:card" content=" ">
    <meta property="twitter:site" content=" ">
    <meta property="twitter:creator" content=" ">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Best Job</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('entreprise/css/main.css') !!}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="icon" type="image/icon" href="https://cdn1.iconfinder.com/data/icons/mobile-device/512/settings-option-configurate-gear-blue-round-512.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- test authentifiaction  blade -->
     
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ url('/entreprise/home') }}">Best Job</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav"> 
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{  url('/entreprise/settings') }}"><i class="fa fa-cog fa-lg"></i> Paramétres</a></li> 
            <li><a class="dropdown-item" href="{{ url('/entreprise/logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-lg"></i>Déconnexion</a>
                 <form id="logout-form" action="{{ url('/entreprise/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ isset(Auth::guard('entreprise')->user()->photo) ? asset('logo_entreprises/'.Auth::guard('entreprise')->user()->photo) :  asset('entreprise/images/no-photo.png')  }}" alt="User Image" width="48" height="48">
        <div>
          <p class="app-sidebar__user-name">{{ isset(Auth::guard('entreprise')->user()->name) ? Auth::guard('entreprise')->user()->name : 'Aucun Nom' }}</p>
          <p class="app-sidebar__user-designation">{{ isset(Auth::guard('entreprise')->user()->email) ? Auth::guard('entreprise')->user()->email : 'Aucun E-mail' }}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item " href="{{ url('/entreprise/home') }}" id="00"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tableau de bord</span></a></li> 
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Offres d'emploi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{  url('/entreprise/offres/add') }}" id="01"><i class="icon fa fa-plus-square"></i>Ajouter un Offre</a></li>
            <li><a class="treeview-item" href="{{  url('/entreprise/offres/list') }}" id="02"><i class="icon fa fa-list-ul"></i>Liste des offres</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Formations</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ url('entreprise/formation/add') }}" id="03"><i class="icon fa fa-plus-square"></i> Ajouter une formation</a></li>
            <li><a class="treeview-item" href="{{ url('entreprise/formation/list') }}" id="04"><i class="icon fa fa-list-ul"></i>Liste des formations</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="{{  url('/entreprise/settings') }}" id="05"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Paramétres </span></a></li> 
      </ul>
    </aside>
 <main class="app-content">
     @yield('content')
     
 </main>
    <!-- Essential javascripts for application to work-->
    <script src="{!! asset('entreprise/js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! asset('entreprise/js/popper.min.js') !!}"></script>
    <script src="{!! asset('entreprise/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('entreprise/js/main.js') !!}"></script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="{!! asset('admin/js/plugins/jquery.dataTables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/plugins/dataTables.bootstrap.min.js') !!}"></script>
    <script type="text/javascript">
    if ($('#sampleTable')) 
      $('#sampleTable').DataTable();
  </script> 
    <!-- The javascript plugin to display page loading on top-->
    <script src="{!! asset('entreprise/js/plugins/pace.min.js') !!}"></script>
    <!-- Page specific javascripts-->
     <script type="text/javascript" src="{!! asset('entreprise/js/plugins/select2.min.js') !!}"></script>
    <script type="text/javascript">
      var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86]
            }
        ]
      };
      var pdata = [
        {
            value: 300,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Complete"
        },
        {
            value: 50,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "In-Progress"
        }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
    <!-- select2  pour  les tags -->
      <script type="text/javascript">
        $('#demoSelect').select2();
      </script>

    <script type="text/javascript">
      $(document).ready(function() {
      $(".app-sidebar a").on("click", function(){
      $("a").find(".active").removeClass("active");
      //$(this).parent().addClass("active");
       });
    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        var itemid = localStorage.getItem("selectedTab");
        if( itemid == null){
          itemid=00;
        }

        if( itemid == 00)
        {
          $("#00").addClass("active");
        }
        if( itemid == 01)
        {
          $("#01").addClass("active");
          $("#01").parent().addClass("is-expanded");
        }
        if( itemid == 02)
        {
          $("#02").addClass("active");
          $("#02").parent().addClass("is-expanded");
        }
        if( itemid == 03)
        {
          $("#03").addClass("active");
          $("#03").parent().addClass("is-expanded");
        }
         if( itemid == 04)
        {
          $("#04").addClass("active");
          $("#04").parent().addClass("is-expanded");
        }
        if( itemid == 05)
        {
          $("#05").addClass("active");
        }

        $(".app-menu a").on('click', function(event) {
              // remove class active section 
              $(".active").removeClass("active");
              // add class active section
              $(this).addClass("active");
              //save the latest tab; use cookies if you like 'em better:
              localStorage.setItem('selectedTab', $(this).attr('id'));
        });

      });
    </script>
  </body>
</html>
