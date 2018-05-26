<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Auth;
 
use \App\Offres;
use \App\Formations;
use \App\entreprise;
use \App\Locations; 
use \App\tags;
use \App\categories;
use \App\typesContrat;
use \App\tagsoffres;

use DateTime;
use File;
class EntrepriseFormationsController extends Controller
{
/* 
* partie ajout  
*/ 

   // get le formulaire d'ajout 
	public function getAjoutForm()
	{
		$lieux= \App\Locations::all(); 
    	$tags= \App\Tags::all();
    	$categories = \App\Categories::all();
    	
    	return view('entreprise/ajouterFormation', compact([ 'lieux', 'tags' ,'categories']));
	}
	// ajouter un formation 
	public function ajoutFormation(Request $request)
	{
 
		// partie validation 
         $validatedData = $request->validate([
        'nom' => 'required',
        'date' => 'required|date|after:tomorrow',
        'description' => 'required',
        'prix' => 'required|integer|min:0', 
        'photo' => 'required', 
        'tags' => 'required',
         ],[
        'nom.required' => 'le nom est obligatoire.',
        'date.required' => ' la date est obligatoire.',
        'date.date' => ' la date saisie , n\'est pas un date valide.',
        'date.after' => ' la date saisie est invalide, Il est toujour supérieur à aujourd\'hui.',
        'description.required' => ' la description est obligatoire.',
        'prix.required' => 'le prix est obligatoire.',
        'prix.integer' => 'le prix n\'est un prix valide.',
        'prix.min' => 'le prix est toujour supérieur ou égale à 0 DTN.', 
        'photo.required' => ' photo est obligatoire.', 
        'tags.required'=> 'les tags est obligatoires.',
        ]);
         // add  to  Data Base 
                	 $formation =  new Formations();
                    // add attribute 
                       $formation->nom = $request->input('nom');  
                       $formation->date =  $request->input('date');
                       $formation->description=  $request->input('description');
                       $formation->prix=  $request->input('prix');
                    // upload photo 
                       $imageName = time().'.'.request()->photo->getClientOriginalExtension();
              		  request()->photo->move(public_path('logo_entreprises'), $imageName);

              		  $formation->photo=$imageName;
                    // foreign key 
                    	 $location = \App\Locations::where(['nom' => $request->input('location_name')])->first();
       					 $categorie = \App\Categories::where(['nom' => $request->input('categorie_name')])->first(); 
       					    $formation->entreprise()->associate(Auth::guard('entreprise')->user());
					        $formation->categorie()->associate($categorie); 
					        $formation->location()->associate( $location);
					// save in  data base 
				    $formation->save(); 
					// ajouter les tags associé à l'offre
				        $tags=$request->input('tags');
				       if (is_array($tags) || is_object($tags))
				        {      foreach($tags as $t) 
				              {  
				                $tag = \App\Tags::where(['nom' => $t])->first();
				                $formation= \App\Formations::where(['nom' => $request->input('nom')])->first();

				                $formation->tags()->attach($tag); 
				              }
				        }    
				    
 
         // return  
          return back()->with('success', 'la formation est ajoutée avec succès.');

	}

/* 
*   partie update 
*/ 

	// get  le formulaire update formation 
	public function getupdateForm($id)
	{
		  $lieux= \App\Locations::all(); 
    	$alltags= \App\Tags::all();
    	$categories = \App\Categories::all();
    	
    	$formation = \App\Formations::where(['id' =>  $id ])->first(); 
        $selectedtags= $formation->tags()->get();

    	return view('entreprise/modifierFormation', compact([ 'lieux', 'alltags' ,'categories','formation','selectedtags']));
	}
	// commit  update formation 
	public function  commitupdateFormation(Request $request, $id)
	{
          // partie validation 
         $validatedData = $request->validate([
        'nom' => 'required',
        'date' => 'required|date|after:tomorrow',
        'description' => 'required',
        'prix' => 'required|integer|min:0',  
        'tags' => 'required',
         ],[
        'nom.required' => 'le nom est obligatoire.',
        'date.required' => ' la date est obligatoire.',
        'date.date' => ' la date saisie , n\'est pas un date valide.',
        'date.after' => ' la date saisie est invalide, Il est toujour supérieur à aujourd\'hui.',
        'description.required' => ' la description est obligatoire.',
        'prix.required' => 'le prix est obligatoire.',
        'prix.integer' => 'le prix n\'est un prix valide.',
        'prix.min' => 'le prix est toujour supérieur ou égale à 0 DTN.',  
        'tags.required'=> 'les tags est obligatoires.',
        ]);
         // select ligne in DB
             $formation = \App\Formations::where('id', $id)->first();

                       $formation->nom = $request->input('nom');  
                       $formation->date =  $request->input('date');
                       $formation->description=  $request->input('description');
                       $formation->prix=  $request->input('prix');

        $location = \App\Locations::where(['nom' => $request->input('location_name')])->first();
        $categorie = \App\Categories::where(['nom' => $request->input('categorie_name')])->first(); 
        $formation->categorie()->associate($categorie); 
        $formation->location()->associate( $location);
        // Detach tags
        $formation->tags()->detach();
        // ajouter les tags associé à l'offre
                $tags=$request->input('tags');
               if (is_array($tags) || is_object($tags))
                {      foreach($tags as $t) 
                      {  
                        $tag = \App\Tags::where(['nom' => $t])->first(); 

                        $formation->tags()->attach($tag); 
                      }
                }
          // update photo 
          if ($request->exists('photo')) { 

              // supprimer l'image précédente s'il existe
              $image_path = public_path()."\\logo_entreprises\\".$formation->photo;
               
                 if (File::exists($image_path)) { 
                        File::delete($image_path);
                  }

              //upload image
              $imageName = time().'.'.request()->photo->getClientOriginalExtension();
              request()->photo->move(public_path('logo_entreprises'), $imageName);
              // DB save photo
              $formation->photo=$imageName;
          }
          // save in  data base 
            $formation->save(); 


        // return  list  des formation restant 
        return redirect()->route('formation.list');
	}

/* 
*   partie suppression 
*/

	// delete formation 
	public function deleteFormation($id)
	{
	
	 \App\Formations::where(['id' =>  $id ])->first()->tags()->detach();
     \App\Formations::where(['id' =>  $id ])->first()->delete();

      // return  list  des offres restant 
      return redirect()->route('formation.list');
	}
/* 
*   partie Lites des formation  
*/	 

	public function listOffres()
	{
		$formations = Auth::guard('entreprise')->user()->formations()->get(); 
        return view('entreprise.listFormations' , compact(['formations',]));
	}
}
