@extends('entreprise.layout.auth')

@section('content')  
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Offres d'emploi</h1>
          <p>Liste des Offres publiés</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Offres</li>
          <li class="breadcrumb-item active"><a href="#">Liste d'offres</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered thead-light " id="sampleTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date Fin</th>
                    <th>Date </th>
                    <th>Salaire</th>
                    <th>Niveau étude</th>
                    <th>Exigence</th>
                    <th>Experiance</th>
                    <th>Afficher</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($offres as $offre) 
                  <tr>
                    <td>{{ $offre->id }}</td>
                    <td>{{ $offre->nom }}</td>
                    <td>{{ $offre->datefin }}</td>
                    <td>{{ $offre->date }}</td>
                    <td>{{ $offre->salaire }}</td>
                    <td>{{ $offre->niv_etude }}</td>
                    <td>{{ $offre->exigence }}</td>
                    <td>{{ $offre->experiance }}</td>
                    <td>
                      <a href="{{ route('offre.show',  $offre->id) }}" class="btn btn-primary btn-sm">
                        Afficher
                      </a> 
                    </td>
                    <td>
                      <a href="{{ route('offre.update',  $offre->id) }}" class="btn btn-info btn-sm">
                        Modifier
                      </a>  
                    </td>
                    <td>
                        <a href="{{ route('offre.delete',  $offre->id) }}" class="btn btn-danger btn-sm">
                        Supprimer
                      </a> 
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection
