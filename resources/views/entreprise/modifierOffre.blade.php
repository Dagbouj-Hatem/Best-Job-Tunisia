@extends('entreprise.layout.auth')

@section('content') 
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Modifier les information de l'offre </h1>
          <p>SVP saisissez les informations suivantes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Offres</li>
          <li class="breadcrumb-item"><a href="#">Modifier offre</a></li>
        </ul>
      </div>
      <form method="POST" action="{{ route('offre.saveupdate',  $offre->id) }}">
         {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom de l'offre</label>
                    <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Nom de l'offre ici" name="nom" value="{{ $offre->nom }}"> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description de l'offre</label>
                    <textarea id="exampleInputPassword1" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"  type="password" placeholder="Description de l'offre ici" rows="15" name="description" 
                    >{{ $offre->description }}</textarea> 
                  </div>
                  <div class="form-group">
                    <label for="exampleSelect1">Catégorie</label>
                    <select class="form-control" id="exampleSelect1" name="categorie_name">
                       @foreach( $categories as $categorie)
                      {
                         <option @if($categorie->id == $offre->categorie_id) selected @endif>{{ $categorie->nom }}</option>
                      }
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="tags">Tags</label>
                       <div class="tile-body {{ $errors->has('tags') ? 'has-error' : '' }}">
                          <select class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" id="demoSelect" multiple="true" name="tags[]">
                                @foreach ($alltags as $key => $value) 
                                    <option value="{{ $value->nom  }}" 
                                       {{ (collect(old('tags'))->contains($value->nom)) ? 'selected':'' }} 

                                       {{ $selectedtags->contains($value) ? 'selected':''}} 
                                       />
                                       {{ $value->nom }}
                                    </option>
                                @endforeach
                          </select>
                        </div>
                  </div>
                    
              </div>
              <div class="col-lg-5 offset-lg-1"> 
                  <div class="form-group"> 
                      <label class="control-label" for="disabledInput">Date</label>
                      <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" id="disabledInput" type="date" name="date" value="{{ $offre->datefin }}">
                 
                  </div>
                  <div class="form-group"> 
                      <label class="control-label" for="readOnlyInput">Salaire </label>
                      <div class="input-group"> 
                            <input class="form-control  {{ $errors->has('salaire') ? 'is-invalid' : '' }}" id="readOnlyInput" type="text" placeholder="Salaire" name="salaire" value="{{ $offre->salaire }}">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">DTN</span>
                            </div>
                    </div> 
                  </div>
                  <div class="form-group has-success">
                    <label class="form-control-label" for="inputSuccess1">Niveau d'étude</label>
                    <select  class="form-control" id="inputValid" type="text" name="niv_etude"> 
                      <option @if( $offre->niv_etude == 'Bac') selected @endif >Bac</option>
                      <option @if( $offre->niv_etude == 'Bac +1') selected @endif >Bac +1</option>
                      <option @if( $offre->niv_etude == 'Bac +2') selected @endif >Bac +2</option>
                      <option @if( $offre->niv_etude == 'Bac +3') selected @endif >Bac +3</option>
                      <option @if( $offre->niv_etude == 'Bac +4') selected @endif >Bac +4</option>
                      <option @if( $offre->niv_etude == 'Bac +5') selected @endif >Bac +5</option>
                      <option @if( $offre->niv_etude == 'Mastère') selected @endif >Mastère</option>
                      <option @if( $offre->niv_etude == 'Ingénierie') selected @endif >Ingénierie</option>
                      <option @if( $offre->niv_etude == 'Doctorat') selected @endif >Doctorat</option>
                    </select>
                  </div>
                  <div class="form-group has-danger">
                    <label class="form-control-label" for="inputDanger1">Exigence</label>
                    <textarea class="form-control  {{ $errors->has('exigence') ? 'is-invalid' : '' }}" id="inputInvalid"  placeholder="Exigence " name="exigence">{{ $offre->exigence }}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputLarge">Expériance</label>
                    <input class="form-control {{ $errors->has('experiance') ? 'is-invalid' : '' }}" id="inputLarge" type="text" name="experiance" value="{{ $offre->experiance }}">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Lieux</label>
                    <select class="form-control" id="inputDefault" name="location_name">
                      @foreach( $lieux as $lieu)
                      {
                         <option @if($lieu->id == $offre->location_id) selected @endif>{{ $lieu->nom }}</option>
                      }
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Type de contrat</label>
                    <select class="form-control" id="inputDefault" name="typescontrat_name">
                      @foreach( $typesContrat as $type)
                      {
                         <option @if($type->id == $offre->type_contrat_id) selected @endif>{{ $type->nom }}</option>
                      }
                      @endforeach
                    </select>
                  </div> 
                  <div class="tile-footer">
                    <button class="btn btn-primary float-right" type="submit">Modifier l'offre</button>
                  </div>  
              </div>
            </div>
            
          </div>
        </div>
      </div>  
      </form>

      <!-- select2  pour  les tags -->
      <script type="text/javascript">
        $('#demoSelect').select2();
      </script>
@endsection
