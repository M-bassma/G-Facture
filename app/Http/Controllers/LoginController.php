<?php

namespace App\Http\Controllers;

use App\Facture;
use Illuminate\Http\Request;
use Validator;
use Auth;
use PDF;

class LoginController extends Controller
{
    //
    function login(){
    	return view('login');
    }
    function checklogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {
      return redirect('login/successlogin');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }

    }
    function successlogin()
    {
     return view('successlogin');
    }
    function nouvelleF()
    {
     return view('nouvelleF');
    }
    function suiviF()
    {
     return view('suiviF');
    }
    function modlogin()
    {
     return view('modlogin');
    }
    function logout()
    {
     Auth::logout();
     return redirect('login');
    }
    function ajoutF(Request $request)
    {
     $this->validate($request , [
        'num_dossier'   => 'required' ,
        'nom_client'    => 'required' ,
        'adresse'       => 'required' ,
        'commune'       => 'required' ,
        'surface'       => 'required' ,
        'nature_projet' => 'required' ,
        'montant_ht'    => 'required' ,
        'tva'           => 'required' ,
        'montant_ttc'   => 'required' ,
     ]);

     $Facture = new Facture;
     $Facture->num_dossier=$request->input('num_dossier');
     $Facture->nom_client=$request->input('nom_client');
     $Facture->adresse=$request->input('adresse');
     $Facture->commune=$request->input('commune');
     $Facture->surface=$request->input('surface');
     $Facture->nature_projet=$request->input('nature_projet');
     $Facture->montant_ht=$request->input('montant_ht');
     $Facture->tva=$request->input('tva');
     $Facture->montant_ttc=$request->input('montant_ttc');
     $Facture->date=date('Y-m-d');
     $Facture->save();
     $pdf = PDF::loadView('order_pdf', compact('Facture'));
     $name = "commandeNo-".$Facture->id.".pdf";
     set_time_limit(6000);
     return $pdf->download($name);
    }
    function condition(Request $request){
        $this->validate($request , [
        'debut'         => 'required' ,
        'fin'           => 'required' ,
        'num_dossier'   => 'required' ,
        'nom_client'    => 'required' ,
        'adresse'       => 'required' ,
        'commune'       => 'required' ,
        'montant_ht'    => 'required' ,
        'tva'           => 'required' ,
        'montant_ttc'   => 'required' ,
     ]);
    $debut=$request->input('debut');
    $fin=$request->input('fin');
    $num_dossier=$request->input('num_dossier');
    $nom_client=$request->input('nom_client');
    $adresse=$request->input('adresse');
    $commune=$request->input('commune');
    $montant_ht=$request->input('montant_ht');
    $tva=$request->input('tva');
    $montant_ttc=$request->input('montant_ttc');
    
switch (true) { 

  case ($debut != 'Toutes' and $fin != 'Toutes'): 
    return redirect('login/date/'.$debut.'/'.$fin);
    break;
  case ($num_dossier != 'Toutes'):
    return redirect('login/dossier/'.$num_dossier);
    break;
  case ($nom_client != 'Toutes'): 
    return redirect('login/client/'.$nom_client);
    break;
  case ($adresse != 'Toutes'):
    return redirect('login/adresse/'.$adresse);
    break;
  case ($commune != 'Toutes'):
    return redirect('login/commune/'.$commune);
    break;
  case ($montant_ht != 'Toutes'):
    return redirect('login/ht/'.$montant_ht);
    break;
  case ($tva != 'Toutes'):
    return redirect('login/tva/'.$tva);
    break;
  case ($montant_ttc != 'Toutes'):
    return redirect('login/ttc/'.$montant_ttc);
    break;
  default: 
    return redirect('login/total');
    break;
}
    }
}