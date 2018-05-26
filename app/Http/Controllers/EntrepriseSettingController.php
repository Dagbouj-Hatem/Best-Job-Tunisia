<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;

class EntrepriseSettingController extends Controller
{
     /* 
    * 
    *   Partie Setting ( Paramétre de compte entreprise )
    *
    */ 

    // affichage du formulaire de paramétre
    public function settings()
    {   
        return view('entreprise.settings');
    }
    //enregister les paramétre modifé
    public function SaveSettings ( Request $request){


      // partie validation 
         $validatedData = $request->validate([
        'email' => 'required|email',
        'name' => 'required',
        'adresse' => 'required',
        'tele' => 'required',
        'fax' => 'required',
        'description' => 'required', 
         ],[
    'email.required' => 'l\'email est obligatoire.',
    'email.email' => ' l\'email saisie , n\'est pas un email valide.',
    'name.required' => ' le nom est obligatoire.',
    'adresse.required' => 'l\'adresse est obligatoire.',
    'tele.required' => ' le téléphone est obligatoire.',
    'fax.required' => ' le fax est obligatoire.',
    'description.required'=> 'le description est obligatoire.',
    ]);

       Auth::guard('entreprise')->user()->name= $request->input('name'); // modification du  nom 
       Auth::guard('entreprise')->user()->email= $request->input('email'); // modification du  email 
       // test if password reste inchangé 
       if($request->input('password') != null)
       {
          Auth::guard('entreprise')->user()->password= bcrypt($request->input('password')); // modification du  password
       }
       Auth::guard('entreprise')->user()->adresse= $request->input('adresse'); // modification du l'adresse
       Auth::guard('entreprise')->user()->tele= $request->input('tele'); // modification tele
       Auth::guard('entreprise')->user()->fax= $request->input('fax'); // modification fax
       Auth::guard('entreprise')->user()->description= $request->input('description'); // modification description
       //upload image & save photo  
       if ($request->exists('photo')) { 

              // supprimer l'image précédente s'il existe
              $image_path = public_path()."\\logo_entreprises\\".Auth::guard('entreprise')->user()->photo;
               
                 if (File::exists($image_path)) { 
                        File::delete($image_path);
                  }

              //upload image
              $imageName = time().'.'.request()->photo->getClientOriginalExtension();
              request()->photo->move(public_path('logo_entreprises'), $imageName);
              // DB save photo
              Auth::guard('entreprise')->user()->photo=$imageName;
       }
              
      
       // enregister dans le base de données 
       Auth::guard('entreprise')->user()->save();

       // redirection ver Home page
       //return redirect('entreprise/home');
       return back()->with('success', 'Modification enregistré avec succès.');

    }
}
