<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

/* data */ 
use \App\Entreprise;
use \App\Admin;
use \App\User;

use \App\Locations; 
use \App\tags;
use \App\categories;
use \App\typesContrat;

class AdminController extends Controller
{
    //get dashbord 
    public function dashboard(){ 
    	return view('admin.dashboard');
    }// get  all tags
	public function tags(){ 
    	$tags= \App\Tags::all(); 
    	return view('admin.tags_list', compact(['tags',]));
	}// get all locations
	public function locations(){
		$lieux= \App\Locations::all();
		return view('admin.locations_list', compact(['lieux',]));
	}// get all type de contrat 
	public function typescontrats(){
		$typesContrat= \App\TypesContrat::all();
		return view('admin.typescontrats_list', compact(['typesContrat',]));
	}// get  all categorie 
	public function categories(){
		$categories = \App\Categories::all();
		return view('admin.categories_list', compact(['categories',]));
	}// get all admins
	public function admins(){
		$admins = \App\Admin::all();
		return view('admin.admins_list', compact(['admins',]));
	}// get all entreprises
	public function entreprises(){
		$entreprises=\App\Entreprise::all();
		return view('admin.entreprises_list', compact(['entreprises',]));
	}
		public function candidats(){
		$candidats=\App\User::all();
		return view('admin.candidats_list', compact(['candidats',]));
	}

	/*
	*	Partie Ajout 
	*/

	public function savetags(Request $request)
	{
		  // partie validation 
         $validatedData = $request->validate([
        'nom' => 'required', 
         ],[
        'nom.required' => 'le nom est obligatoire.', 
        ]); 
        $tags =  new Tags();
   		 // add attribute 
        $tags->nom = $request->input('nom');  
        $tags->save();   
		return redirect()->route('tags');
	}
	public function savelocations(Request $request)
	{
		 // partie validation 
         $validatedData = $request->validate([
        'nom' => 'required', 
         ],[
        'nom.required' => 'le nom est obligatoire.', 
        ]); 

        $locations =  new Locations();
   		 // add attribute 
        $locations->nom = $request->input('nom');  

        $locations->save();   
		return redirect()->route('locations');
	}
	public function savetypescontrats(Request $request)
	{
		 // partie validation 
         $validatedData = $request->validate([
        'nom' => 'required', 
         ],[
        'nom.required' => 'le nom est obligatoire.', 
        ]); 
        $typesContrat =  new TypesContrat();
   		 // add attribute 
        $typesContrat->nom = $request->input('nom');  
        $typesContrat->save();   
		return redirect()->route('typescontrats');
	}
	public function savecategories(Request $request)
	{
		 // partie validation 
         $validatedData = $request->validate([
        'nom' => 'required', 
         ],[
        'nom.required' => 'le nom est obligatoire.', 
        ]); 
        $categorie =  new Categories();
   		 // add attribute 
        $categorie->nom = $request->input('nom');  
        $categorie->save();   
        return redirect()->route('categories');
	}
	public function saveadmins(Request $request)
	{
		 // partie validation 
         $validatedData = $request->validate([
        'nom' => 'required', 
        'prenom' => 'required', 
        'email' => 'required|email', 
        'password' => 'required', 
         ],[
        'nom.required' => 'le nom est obligatoire.', 
        'prenom.required' => 'le prénom est obligatoire.', 
        'email.required' => 'l\' Email est obligatoire.', 
        'email.email' => 'Vérifier l\' email.', 
        'password.required' => 'le mot de passe est obligatoire.', 
        ]); 
        $admin =  new Admin();
   		 // add attribute 
        $admin->name = $request->input('nom');  
        $admin->prenom = $request->input('prenom');  
        $admin->email = $request->input('email');  
        $admin->password =  bcrypt($request->input('password'));  
        $admin->save();   
        return redirect()->route('admins');
	} 
	public function addtags()
	{
		return view('admin.addtags');
	}
	public function addlocations()
	{
		return view('admin.addlocations');
	}
	public function addtypescontrats()
	{
		return view('admin.addtypescontrats');
	}
	public function addcategories()
	{
		return view('admin.addcategories');
	}
	public function addadmins()
	{
		return view('admin.addadmins');
	}
 

	/*
	*	Partie suppression 
	*/  
	public function deletelocations($id)
	{
      \App\locations::where(['id' =>  $id ])->first()->delete(); 
      return redirect()->route('locations');
	}
	public function deletetags($id)
	{
     \App\tags::where(['id' =>  $id ])->first()->delete(); 
      return redirect()->route('tags');
	}
	public function deletetypescontrats($id)
	{
      \App\typescontrat::where(['id' =>  $id ])->first()->delete(); 
      return redirect()->route('typescontrats');
	}
	public function deletecategories($id)
	{
     \App\categories::where(['id' =>  $id ])->first()->delete(); 
      return redirect()->route('categories');
	}
	public function deleteentreprises($id)
	{
     \App\Entreprise::where(['id' =>  $id ])->first()->delete(); 
      return redirect()->route('entreprises');
	}
	public function deleteadmins($id)
	{
     \App\Admin::where(['id' =>  $id ])->first()->delete(); 
      return redirect()->route('admins');
	}
		public function deletecandidat($id)
	{
     \App\User::where(['id' =>  $id ])->first()->delete(); 
      return redirect()->route('candidats');
	}

	/*
	*	Partie settings 
	*/
	public function settings()
	{
		return view('admin.settings');
	}
	public function SaveSettings(Request $request)
	{
		 // partie validation 
         $validatedData = $request->validate([
        'email' => 'required|email',
        'name' => 'required',
        'prenom' => 'required', 
         ],[
	    'email.required' => 'l\'email est obligatoire.',
	    'email.email' => ' l\'email saisie , n\'est pas un email valide.',
	    'name.required' => ' le nom est obligatoire.',
	    'prenom.required' => 'le prénom est obligatoire.', 
	    ]);

         // change data 
       Auth::guard('admin')->user()->name= $request->input('name'); // modification du  nom 
       Auth::guard('admin')->user()->prenom= $request->input('prenom'); // modification du  prenom 
       Auth::guard('admin')->user()->email= $request->input('email'); // modification du  email 
       // test if password reste inchangé 
       if($request->input('password') != null)
       {
          Auth::guard('admin')->user()->password= bcrypt($request->input('password')); // modification du  password
       }
       // enregister dans le base de données 
       Auth::guard('admin')->user()->save();

		return redirect()->route('dashboard');
	}
}
