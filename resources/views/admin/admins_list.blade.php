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
      <div class="app-sidebar__user"><div>
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
        <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Administrateurs</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            @if(Auth::guard('admin')->user()->id==1)
            <li><a class="treeview-item" href="/admin/dashboard/admins/add"><i class="icon fa fa-plus-square"></i> Ajouter un administrateur</a></li>
            @endif
            <li><a class="treeview-item active" href="/admin/dashboard/admins"><i class="icon fa fa-list-ul"></i>Liste des administrateurs</a></li>
          </ul>
        </li>        
        <li class="treeview "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Entreprises</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item " href="/admin/dashboard/entreprises"><i class="icon fa fa-list-ul"></i>Liste des entreprises</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Candidats</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/admin/dashboard/candidats"><i class="icon fa fa-list-ul"></i>Liste des candidats</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="/admin/dashboard/settings"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Paramétres</span></a></li> 
      </ul>
    </aside>
 <main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Administrateur</h1>
          <p> la liste des administrateurs</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tableau de bord</li>
          <li class="breadcrumb-item active"><a href="#"> Administrateurs</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
               <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th> 
                    @if(Auth::guard('admin')->user()->id==1)
                    <th class="text-center">Supprimer</th> 
                    @endif
                  </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin) 
                  <tr> 
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->prenom }}</td>
                    <td>{{ $admin->email }}</td> 
                     @if(Auth::guard('admin')->user()->id==1)
                    <td class="text-center">
                        <!--a href="{{ route('deleteadmins',  $admin->id) }}" class="btn btn-danger btn-sm">
                        Supprimer
                      </a-->  
                       
                       <a href="{{ route('deleteadmins',  $admin->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Supprimer
                      </a>
                    </td>
                     @endif
                  </tr>
                @endforeach
                </tbody>
              </table>

              <!-- modal  delete confirm  -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="get" action="{{ route('deleteadmins',  $admin->id) }}">
                            {{ csrf_field() }}
                          <div class="modal-body">
                          Etes-vous sûr de vouloir supprimer ce administrateur ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button  class="btn btn-danger" type="submit">Supprimer</button>
                          </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end modal  delete confirm  -->
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{!! asset('admin/js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! asset('admin/js/popper.min.js') !!}"></script>
    <script src="{!! asset('admin/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('admin/js/main.js') !!}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{!! asset('admin/js/plugins/pace.min.js') !!}"></script>
        <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="{!! asset('admin/js/plugins/jquery.dataTables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/plugins/dataTables.bootstrap.min.js') !!}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- confirm  delete admin -->
    <script type="text/javascript">
        $('#confirm-delete').on('show.bs.modal', function(e) {
    // Find data-href attribute
    // Call ajax OR submit a hidden form?
        });
    </script>
  </body>
</html>