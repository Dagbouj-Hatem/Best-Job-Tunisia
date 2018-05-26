@extends('entreprise.layout.auth')

@section('content') 
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Modifier les information de formation </h1>
          <p>SVP saisissez les informations suivantes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Formations</li>
          <li class="breadcrumb-item"><a href="#">Modifier formation</a></li>
        </ul>
      </div>
      <form method="POST" action="{{ route('formation.saveupdate',  $formation->id) }}"  enctype="multipart/form-data">
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
                    <label for="exampleInputEmail1">Nom de formation</label>
                    <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Nom de l'formation ici" name="nom" value="{{ $formation->nom }}"> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description de formation</label>
                    <textarea id="exampleInputPassword1" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"  type="password" placeholder="Description de l'formation ici" rows="17" name="description" 
                    >{{ $formation->description }}</textarea> 
                  </div>
                  
              </div>
              <div class="col-lg-5 offset-lg-1"> 
                  <div class="form-group"> 
                      <label class="control-label" for="disabledInput">Date Fin</label>
                      <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" id="disabledInput" type="date" name="date" value="{{ $formation->date }}">
                 
                  </div>
                  <div class="form-group"> 
                      <label class="control-label" for="readOnlyInput">Prix </label>
                      <div class="input-group"> 
                            <input class="form-control  {{ $errors->has('prix') ? 'is-invalid' : '' }}" id="readOnlyInput" type="text" placeholder="Prix" name="prix" value="{{ $formation->prix }}">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">DTN</span>
                            </div>
                    </div> 
                  </div> 
                  
                  <div class="form-group">
                    <label class="col-form-label" for="inputLarge">Photo</label>
                    <input class="form-control-file" id="inputLarge" type="file" name="photo" value="{{ $formation->photo }}">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Lieux</label>
                    <select class="form-control" id="inputDefault" name="location_name">
                      @foreach( $lieux as $lieu)
                      {
                         <option @if($lieu->id == $formation->location_id) selected @endif>{{ $lieu->nom }}</option>
                      }
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="tags">Tags</label>
                       <div class="tile-body {{ $errors->has('tags') ? 'has-error' : '' }}">
                          <select class="form-control " id="demoSelect" multiple="true" name="tags[]">
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
                  <div class="form-group">
                    <label for="exampleSelect1">Catégorie</label>
                    <select class="form-control" id="exampleSelect1" name="categorie_name">
                       @foreach( $categories as $categorie)
                      {
                         <option @if($categorie->id == $formation->categorie_id) selected @endif>{{ $categorie->nom }}</option>
                      }
                      @endforeach
                    </select>
                  </div>
                    
                  <div class="tile-footer">
                    <button class="btn btn-primary float-right" type="submit">Modifier la formation</button>
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
