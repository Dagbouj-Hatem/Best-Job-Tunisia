@extends('entreprise.layout.auth')

@section('content')  
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Formations</h1>
          <p>Liste des formations publiés</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Formations</li>
          <li class="breadcrumb-item active"><a href="#">Liste des formations</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered thead-light " id="sampleTable">
                <thead>
                  <tr>
                    <th>Photo</th>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date</th> 
                    <th>Description</th> 
                    <th>Prix</th> 
                    <th>Afficher</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($formations as $formation) 
                  <tr>
                    <td><img  src="{{ asset('logo_entreprises/'.$formation->photo) }}" alt="formation Image" width="30" height="30"></td>
                    <td>{{ $formation->id }}</td>
                    <td>{{ $formation->nom }}</td>
                    <td>{{ $formation->date }}</td>
                    <td>{{ $formation->description }}</td>
                    <td>{{ $formation->prix }}</td> 
                    <td>
                      <a href="{{ route('formation.show',  $formation->id) }}" class="btn btn-primary btn-sm">
                        Afficher
                      </a> 
                    </td>
                    <td>
                      <a href="{{ route('formation.update',  $formation->id) }}" class="btn btn-info btn-sm">
                        Modifier
                      </a>  
                    </td>
                    <td>
                        <a href="{{ route('formation.delete',  $formation->id) }}" class="btn btn-danger btn-sm">
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
