@extends('entreprise.layout.auth')

@section('content')
     
     <!-- alert -->
     <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Bienvenue ! </strong>
        Actualement  vous etes authentifié en tant que entreprises.
    </div>
    <!--  end alert -->


     <img src="{!! asset('entreprise/images/background1.jpg') !!}" class="img img-fluid">
     
     <script type="text/javascript">

        // remove Alert after a fiew Min
       window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);

       // test if the first time , the alert is showed
       $(document).ready(function(){

        var show  = localStorage.getItem("show");
                if(show == null){
                     localStorage.setItem('show', "00");
                }
                else
                {
                     $(".alert").remove();
                }
       });

     </script>
@endsection
