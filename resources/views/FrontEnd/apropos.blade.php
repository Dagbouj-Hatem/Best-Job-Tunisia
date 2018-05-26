@extends('welcome')

@section('content')
<style type="text/css">
	.row {
		padding : 8px 0px; 
	}
</style>
 <div class="container" style="margin-bottom: 60px;">
 	<h1 class="text-primary text-center text-uppercase" style="margin: 50px 0px;">Contactez nous</h1>
     <div class="row">
     	<div class="col-lg-4">
     		<div class="row">
     			<div class="col-lg-12">
     				<i class="fa  fa-map-marker"></i>
     				56 , rue echem , lafayette tunis
     			</div>
     		</div>
     		<div class="row">
     			<div class="col-lg-12">
     			<i class="fa fa-phone-square"></i>
     			+216 90 007 08
     		</div>
     		</div>
     		<div class="row">
     			<div class="col-lg-12">
     				<i class="fa fa-phone-square"></i>
     				+216 24 972 095
     			</div>
     		</div>
     		<div class="row">
     			<div class="col-lg-12"><i class="fa fa-envelope"></i>
     				contact@bestjobtunisia.com
     			</div>
     		</div>
     		  	 
     	</div>
     	<div class="col-lg-8">

     		<div class="row">
		     		<div class="col-lg-6">
		     			<input type="text" name="" class="form-control" placeholder="Votre Nom :">
		     		</div>
		     		<div class="col-lg-6">
		     			<input type="text" name="" class="form-control" placeholder="Votre Mail :">
		     		</div>	
     		</div>
     		<div class="row">
		     		<div class="col-lg-12">
		     			<input type="text" name="" class="form-control" placeholder="Sujet :">
		     		</div> 
     		</div>
     		<div class="row">
		     		<div class="col-lg-12">
		     			<textarea class="form-control" rows="5" placeholder="Votre message ..."></textarea>
		     		</div> 
     		</div>
     		<div class="row">
		     		<div class="col-lg-12">
		     			
		     			<button  re type="submit" value="" class="btn btn-success pull-right"
		     			><i class="fa fa-check-circle"></i>  Envoyer</button>
		     		</div> 
     		</div>
     	</div>

     </div>
 </div>
@endsection
