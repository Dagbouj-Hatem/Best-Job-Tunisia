<!DOCTYPE html>
<html lang="fr">
  <head> 
    <title>Espace Admin - Dashboard</title>
    <meta charset="utf-8"> 
    <link rel="stylesheet" type="text/css" href="{!! asset('admin/css/main.css') !!}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/icon" href="https://cdn1.iconfinder.com/data/icons/mobile-device/512/settings-option-configurate-gear-blue-round-512.png">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="/admin/dashboard/">Best Job</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav"> 
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="/admin/dashboard/settings"><i class="fa fa-cog fa-lg"></i> Paramétres</a></li>
            <li><a class="dropdown-item" href="{{ url('/admin/logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-lg"></i>Déconnexion</a>
                 <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
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
      <div class="app-sidebar__user"> 
        <div>
          <p class="app-sidebar__user-name">{{ isset(Auth::guard('admin')->user()->name) ? Auth::guard('admin')->user()->name : 'Aucun Nom' }}
            <?php echo ' '; ?>
            {{ isset(Auth::guard('admin')->user()->prenom) ? Auth::guard('admin')->user()->prenom : 'Aucun prénom' }}</p>
          <p class="app-sidebar__user-designation">{{ isset(Auth::guard('admin')->user()->email) ? Auth::guard('admin')->user()->email : 'Aucun E-mail' }}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="/admin/dashboard/"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tableau de bord</span></a></li> 
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Catégories</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/admin/dashboard/categories/add"><i class="icon fa fa-plus-square"></i>Ajouter un catégorie</a></li>
            <li><a class="treeview-item" href="/admin/dashboard/categories"><i class="icon fa fa-list-ul"></i>Liste des catégories</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Lieux</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/admin/dashboard/locations/add"><i class="icon fa fa-plus-square"></i> Ajouter un lieu</a></li>
            <li><a class="treeview-item" href="/admin/dashboard/locations"><i class="icon fa fa-list-ul"></i>Liste des lieux</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Mots clés</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/admin/dashboard/tags/add"><i class="icon fa fa-plus-square"></i> Ajouter un mot clé</a></li>
            <li><a class="treeview-item" href="/admin/dashboard/tags"><i class="icon fa fa-list-ul"></i>Liste des mots clés</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Types de contrats</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/admin/dashboard/typescontrats/add"><i class="icon fa fa-plus-square"></i> Ajouter un type de contrat</a></li>
            <li><a class="treeview-item" href="/admin/dashboard/typescontrats"><i class="icon fa fa-list-ul"></i>Liste des types de contrats</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Administrateurs</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            @if(Auth::guard('admin')->user()->id==1)
            <li><a class="treeview-item" href="/admin/dashboard/admins/add"><i class="icon fa fa-plus-square"></i> Ajouter un administrateur</a></li>
            @endif
            <li><a class="treeview-item" href="/admin/dashboard/admins"><i class="icon fa fa-list-ul"></i>Liste des administrateurs</a></li>
          </ul>
        </li>        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Entreprises</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/admin/dashboard/entreprises"><i class="icon fa fa-list-ul"></i>Liste des entreprises</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Candidats</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/admin/dashboard/candidats"><i class="icon fa fa-list-ul"></i>Liste des candidats</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item active" href="/admin/dashboard/settings"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Paramétres</span></a></li> 
      </ul>
    </aside>
    <main class="app-content">
 <div class="app-title">
        <div>
          <h1><i class="fa fa-cog"></i>  Paramétres</h1>
          <p>Modifier les paramétres du compte</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tableau de bord</li>
          <li class="breadcrumb-item active"><a href="#">Paramétres</a></li>
        </ul>
      </div>  
      <form method="POST" action="{{ url('admin/dashboard/SaveSettings') }}">
         {{ csrf_field() }}
    
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button> 
                 {{ Session::get('success') }}
                  @php

                  Session::forget('success');

                  @endphp
              </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button> 
                <strong>Erreur de Saisie .</strong> SVP vérifier les informations suivantes : 
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row"> 
              <div class="col-lg-6">   
                  <div class="form-group ">
                    <label for="exampleInputPassword1">Nom</label>
                    <input id="exampleInputPassword1" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"  type="text" placeholder="Votre nom ici"  name="name" value="{{ isset(Auth::guard('admin')->user()->name) ? Auth::guard('admin')->user()->name : '' }}"> 
                  </div> 
                  <div class="form-group">
                    <label class="prenom">Prénom</label>
                    <input id="prenom" class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}"  type="text" placeholder="Votre prénom ici"  name="prenom" value="{{ isset(Auth::guard('admin')->user()->prenom) ? Auth::guard('admin')->user()->prenom : '' }}"> 
                  </div>
              </div>
              <div class="col-lg-5 offset-lg-1">  
                  <div class="form-group"> 
                      <label class="control-label" for="readOnlyInput">Email :</label>
                      <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="readOnlyInput" type="email" placeholder="Email" name="email" value="{{ isset(Auth::guard('admin')->user()->email) ? Auth::guard('admin')->user()->email : '' }}"> 
                  </div>
                  <div class="form-group has-success">
                    <label class="form-control-label" for="inputSuccess1">Mot de passe :</label>
                    <input   class="form-control " id="inputValid" type="password" name="password" placeholder="Password : si champ reste vide le password reste inchangé">  
                  </div>
                  
                  <div class="tile-footer">
                    <button class="btn btn-primary float-right" type="submit">Enregister les modifications</button>
                  </div>  
              </div>
            </div>
            
          </div>
        </div>
      </div>  
      </form>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{!! asset('admin/js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! asset('admin/js/popper.min.js') !!}"></script>
    <script src="{!! asset('admin/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('admin/js/main.js') !!}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{!! asset('admin/js/plugins/pace.min.js') !!}"></script>
  </body>
</html>