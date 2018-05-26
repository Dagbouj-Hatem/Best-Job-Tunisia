@extends('entreprise.layout.auth')

@section('content')  
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
      <form method="POST" action="{{ url('entreprise/SaveSettings') }}"  enctype="multipart/form-data">
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
                  <div class="form-group"> 
                    <img src="{{ isset(Auth::guard('entreprise')->user()->photo) ? asset('logo_entreprises/'.Auth::guard('entreprise')->user()->photo) :  asset('entreprise/images/no-photo.png')  }}" class="img-fluid ">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" type="file" aria-describedby="emailHelp" placeholder="Nom de l'offre ici" name="photo"> 
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputPassword1">Description de l'entreprises</label>
                    <textarea id="exampleInputPassword1" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"  type="password" placeholder="Description de l'entreprise ici" rows="15" name="description">{{ isset(Auth::guard('entreprise')->user()->description) ? Auth::guard('entreprise')->user()->description : '' }}</textarea> 
                  </div> 
              </div>
              <div class="col-lg-5 offset-lg-1"> 
                  <div class="form-group"> 
                      <label class="control-label" for="disabledInput">Nom de l'entreprise : </label>
                      <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="disabledInput" type="text" name="name"
                       value="{{ isset(Auth::guard('entreprise')->user()->name) ? Auth::guard('entreprise')->user()->name : '' }}" placeholder="Aucun Nom">
                 
                  </div>
                  <div class="form-group"> 
                      <label class="control-label" for="readOnlyInput">Email de l'entreprise :</label>
                      <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="readOnlyInput" type="email" placeholder="Email" name="email" value="{{ isset(Auth::guard('entreprise')->user()->email) ? Auth::guard('entreprise')->user()->email : '' }}"> 
                  </div>
                  <div class="form-group has-success">
                    <label class="form-control-label" for="inputSuccess1">Mot de passe de l'entreprise :</label>
                    <input   class="form-control " id="inputValid" type="password" name="password" placeholder="Password : si champ reste vide le password reste inchangé">  
                  </div>
                  <div class="form-group has-danger">
                    <label class="form-control-label" for="inputDanger1">Adresse de l'entreprise :</label>
                    <textarea class="form-control  {{ $errors->has('adresse') ? 'is-invalid' : '' }}" id="inputInvalid"  placeholder="Adresse ..." name="adresse">{{ isset(Auth::guard('entreprise')->user()->adresse) ? Auth::guard('entreprise')->user()->adresse : '' }}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputLarge">Téléphone :</label>
                    <input class="form-control {{ $errors->has('tele') ? 'is-invalid' : '' }}" id="inputLarge" type="text" name="tele" placeholder="Téléphone" value="{{ isset(Auth::guard('entreprise')->user()->tele) ? Auth::guard('entreprise')->user()->tele : '' }}">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Fax : </label>
                    <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" id="inputDefault" name="fax" placeholder="Fax" type="text" value="{{ isset(Auth::guard('entreprise')->user()->fax) ? Auth::guard('entreprise')->user()->fax : '' }}"> 
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

@endsection
