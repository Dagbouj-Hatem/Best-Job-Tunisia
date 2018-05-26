<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Auth;
 
use \App\Offres;
use \App\entreprise;
use \App\Locations; 
use \App\tags;
use \App\categories;
use \App\typesContrat;
use \App\tagsoffres;

use DateTime;

class EntrepriseOffresController extends Controller
{
     
    /*
    * Partie Ajout offre d'emploi
    *
    */

    // afficher formulaire d'ajout d'un offre
    public function formaddoffre()
    { 
    	$lieux= \App\Locations::all();
    	$typesContrat= \App\TypesContrat::all();
    	$tags= \App\Tags::all();
    	$categories = \App\Categories::all();

    	
    	return view('entreprise/ajouterOffre', compact([ 'lieux','typesContrat', 'tags' ,'categories']));
    }

    // ajouter l'offre dans BD 
    public function addoffre(Request $request)
    {
         // partie validation 
         $validatedData = $request->validate([
        'nom' => 'required',
        'date' => 'required|date|after:tomorrow',
        'description' => 'required',
        'salaire' => 'required|integer|min:0',
        'niv_etude' => 'required',
        'exigence' => 'required',
        'experiance' => 'required',
        'tags' => 'required',
         ],[
        'nom.required' => 'le nom est obligatoire.',
        'date.required' => ' la date est obligatoire.',
        'date.date' => ' la date saisie , n\'est pas un date valide.',
        'date.after' => ' la date saisie est invalide, Il est toujour supérieur à aujourd\'hui.',
        'description.required' => ' la description est obligatoire.',
        'salaire.required' => 'le salaire est obligatoire.',
        'salaire.integer' => 'le salaire n\'est un salaire valide.',
        'salaire.min' => 'le salaire est toujour supérieur ou égale à 0 DTN.',
        'niv_etude.required' => ' le niveau d\'étude est obligatoire.',
        'exigence.required' => ' l\'exigence est obligatoire.',
        'experiance.required'=> 'l\'experiance est obligatoire.',
        'tags.required'=> 'les tags est obligatoires.',
        ]);


        $location = \App\Locations::where(['nom' => $request->input('location_name')])->first();
        $categorie = \App\Categories::where(['nom' => $request->input('categorie_name')])->first();
        $typecontrat = \App\TypesContrat::where(['nom' => $request->input('typescontrat_name')])->first();

        $offre =  new Offres();
                    // add attribute 
                       $offre->nom = $request->input('nom'); 
                       $offre->date =   new DateTime();  // date time courant 
                       $offre->datefin =  $request->input('date');
                       $offre->description=  $request->input('description');
                       $offre->salaire=  $request->input('salaire');
                       $offre->niv_etude=  $request->input('niv_etude');
                       $offre->exigence =  $request->input('exigence');
                       $offre->experiance=  $request->input('experiance');

        // les clés étrangères 
        $offre->entreprise()->associate(Auth::guard('entreprise')->user());
        $offre->categorie()->associate($categorie); 
        $offre->location()->associate( $location);
        $offre->type_contrat()->associate( $typecontrat);

        $offre->save();  
        // ajouter les tags associé à l'offre
        $tags=$request->input('tags');
       if (is_array($tags) || is_object($tags))
        {      foreach($tags as $t) 
              {  
                $tag = \App\Tags::where(['nom' => $t])->first();
                $offre= \App\offres::where(['nom' => $request->input('nom')])->first();

                $offre->tags()->attach($tag); 
              }
        }    
         //return redirect()->route('offres.list');
          return back()->with('success', 'Offre ajoutée avec succès.');
    }


      /*
      * Partie Delete offre d'emploi
      *
      */


     // delete offre
    public function deleteOffre ($id ){
     \App\offres::where(['id' =>  $id ])->first()->tags()->detach();
     \App\offres::where(['id' =>  $id ])->first()->delete();

      // return  list  des offres restant 
      return redirect()->route('offres.list');

    }

/*
* Partie Update offre d'emploi
*
*/


    //update offre 
    public function updateOffre ($id) {
      $lieux= \App\Locations::all();
      $typesContrat= \App\TypesContrat::all();
      $alltags= \App\Tags::all();
      $categories = \App\Categories::all();

      $offre = \App\offres::where(['id' =>  $id ])->first(); 
      $selectedtags= $offre->tags()->get();

      return view('entreprise.modifierOffre' , compact(['offre','lieux','typesContrat' ,'categories' ,'selectedtags', 'alltags', ]));

    }
    // commit update offre  
    public function commitupdateoffre($id,Request $request)
    {
       // partie validation 
         $validatedData = $request->validate([
        'nom' => 'required',
        'date' => 'required|date|after:tomorrow',
        'description' => 'required',
        'salaire' => 'required|integer|min:0',
        'niv_etude' => 'required',
        'exigence' => 'required',
        'experiance' => 'required',
        'tags' => 'required',
         ],[
        'nom.required' => 'le nom est obligatoire.',
        'date.required' => ' la date est obligatoire.',
        'date.date' => ' la date saisie , n\'est pas un date valide.',
        'date.after' => ' la date saisie est invalide, Il est toujour supérieur à aujourd\'hui.',
        'description.required' => ' la description est obligatoire.',
        'salaire.required' => 'le salaire est obligatoire.',
        'salaire.integer' => 'le salaire n\'est un salaire valide.',
        'salaire.min' => 'le salaire est toujour supérieur ou égale à 0 DTN.',
        'niv_etude.required' => ' le niveau d\'étude est obligatoire.',
        'exigence.required' => ' l\'exigence est obligatoire.',
        'experiance.required'=> 'l\'experiance est obligatoire.',
        'tags.required'=> 'les tags est obligatoires.',
        ]);
      // modification  DB

              // select ligne in DB
             $offre = \App\offres::where('id', $id)->first();
             // update attribute  
             $offre->nom = $request->input('nom');             
             $offre->datefin =  $request->input('date');
             $offre->description=  $request->input('description');
             $offre->salaire=  $request->input('salaire');
             $offre->niv_etude=  $request->input('niv_etude');
             $offre->exigence =  $request->input('exigence');
             $offre->experiance=  $request->input('experiance');
             // update foreignkeys  
              $location = \App\Locations::where(['nom' => $request->input('location_name')])->first();
              $categorie = \App\Categories::where(['nom' => $request->input('categorie_name')])->first();
              $typecontrat = \App\TypesContrat::where(['nom' => $request->input('typescontrat_name')])->first();

              $offre->entreprise()->associate(Auth::guard('entreprise')->user());
              $offre->categorie()->associate($categorie); 
              $offre->location()->associate( $location);
              $offre->type_contrat()->associate( $typecontrat);
             // tags detach
                  $offre->tags()->detach();
                
               // ajouter les tags associé à l'offre
                $tags=$request->input('tags');
               if (is_array($tags) || is_object($tags))
                {      foreach($tags as $t) 
                      {  
                        $tag = \App\Tags::where(['nom' => $t])->first();
                        //$offre= \App\offres::where(['nom' => $request->input('nom')])->first();

                        // attach
                        $offre->tags()->attach($tag); 
                      }
                } 
             // enregistré modification DataBase
             $offre->save();

      // return  list  des offres restant 
      return redirect()->route('offres.list');
    }
    // liste des offres 
    public function listOffres()
    {   
        $offres = Auth::guard('entreprise')->user()->offres()->get(); 
        return view('entreprise.listOffres' , compact(['offres',]));
    }
   


   
}
