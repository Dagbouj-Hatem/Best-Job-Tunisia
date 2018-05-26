@extends('welcome')

@section('content')
 <div class="container-fluid">
    <div class="single">  
       <div class="col-md-9 single_right">
          <div class="but_list">
           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
@foreach($formations as $formation)           
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">            
             <div class="panel panel-default" >
              <div class="panel-body"  >
                   <div class="tab_grid">
                    <div class="jobs-item with-thumb">
                        <div class="thumb"><a href="jobs_single.html"><img src="{{ isset($formation->entreprise->photo) ? asset('logo_entreprises/'.$formation->entreprise->photo) :  asset('entreprise/images/no-photo.png')  }}" class="img-responsive" alt=""/></a></div>
                        <div class="jobs_right">
                            <div class="date">{{$formation->date }}<span>{{$formation->date }}</span></div>
                            <div class="date_desc"><h6 class="title"><a href="#">{{$formation->nom }}</a></h6>
                              <span class="meta">{{$formation->entreprise->name }}</span>
                            </div> 
                            <p class="description">{{$formation->description }}
                              <!--a href="jobs_single.html" class="read-more btn btn-default">Read More</a--></p>
                        </div> 
                    </div>
                 </div>
              </div>
              <div class="panel-footer"> 
                <i class="fa fa-map-marker"></i>
                <span>{{$formation->location->nom }}</span> 
                  </div>
                </div>
              </div>     
          </div> 
@endforeach
     </div>
    </div>
    <div class="text-center">{{ $formations->links() }}</div>
    
   </div>
   <div class="col-md-3">
<div class="panel panel-default" >
 <div class="panel-body"  >
          <div class="widget_search">
            <h5 class="widget-title" style="color: #FF6532;">Chercher</h5>
            <div class="widget-content">
                <span>Je recherche un ...</span>
                <select class="form-control "> 
                     @foreach($categories as $categorie)
                              <option value="{{$categorie->nom }}" class="text-lg-center">{{$categorie->nom }}</option> 
                      @endforeach
                </select>
                <span>dans</span>
                <div class="form-group">
                  <select class="form-control  "> 
                       @foreach($lieux as $location)
                                <option value="{{$location->nom }}">{{$location->nom }}</option> 
                        @endforeach
                  </select>
                </div>
                 <div class="form-group">
                    <select class="form-control  "> 
                     @foreach($tags as $tag)
                              <option value="{{$tag->nom }}">{{$tag->nom }}</option> 
                      @endforeach
                     </select>
                </div>
                <div class="form-group">
                    <select class="form-control "> 
                     @foreach($typesContrat as $type)
                              <option value="{{$tag->nom }}">{{$type->nom }}</option> 
                      @endforeach
                     </select>
                </div>
                <input type="submit" class="btn btn-default" value="Search">
            </div>
          </div>
          <div class="col_3">
            <h3>Nos Entreprises </h3>
              <table class="table">
                    <tbody> 
                     @foreach($entreprises as $entreprise)
                      
                        <tr class="unread checked"> 
                            <td class="hidden-xs">
                               <a href="">{{$entreprise->name }}</a>
                            </td>
                       </tr>
                      
                      @endforeach
                    </tbody>
             </table>
          </div>
          </div>
</div>
</div>
 </div>
  <div class="clearfix"> </div>
 </div>
</div>
@endsection
