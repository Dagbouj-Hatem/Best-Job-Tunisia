<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontEndController extends Controller
{
    public function offres() {

    	$lieux= \App\Locations::all();
    	$typesContrat= \App\TypesContrat::all();
    	$tags= \App\Tags::all();
    	$categories = \App\Categories::all();
    	$entreprises= \App\Entreprise::all();
    	$offres= \App\Offres::paginate(5);
    	return view('FrontEnd.offres', compact([ 'lieux','typesContrat', 'tags' ,'categories','entreprises','offres',]));
	}

	public  function apropos(){
		  return view('FrontEnd.apropos');
	} 
	public  function formations(){
	    $lieux= \App\Locations::all();
    	$typesContrat= \App\TypesContrat::all();
    	$tags= \App\Tags::all();
    	$categories = \App\Categories::all();
    	$entreprises= \App\Entreprise::all();
    	$formations= \App\formations::paginate(5);
  		return view('FrontEnd.formations', compact([ 'lieux','typesContrat', 'tags' ,'categories','entreprises','formations',]));
	}
	public function coutoffresbyentreprise($id)
	{
		return new Response($entreprises= \App\Entreprise::where(['id' =>  $id ])->first()->offres()->get()->count()); 
	}
}
