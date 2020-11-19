<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facture as Factures;

class FactureController extends Controller
{
    //
    public function date($debut,$fin){
        $Factures = Factures::whereBetween('date',array($debut,$fin) )->get();
    	return view('Factures', ['listeFactures' => $Factures]);
    }
    public function dossier($num_dossier){
    	$Factures = Factures::where('num_dossier', $num_dossier)->get();
    	return view('Factures', ['listeFactures' => $Factures]);
    }
    public function client($nom_client){
		$Factures = Factures::where('nom_client', $nom_client)->get();
    	return view('Factures', ['listeFactures' => $Factures]);
    }
    public function adresse($adresse){
		$Factures = Factures::where('adresse', $adresse)->get();
    	return view('Factures', ['listeFactures' => $Factures]);
    }
    public function commune($commune){
		$Factures = Factures::where('commune', $commune)->get();
    	return view('Factures', ['listeFactures' => $Factures]);
    }
    public function ht($montant_ht){
 	   	$Factures = Factures::where('montant_ht', $montant_ht)->get();
    	return view('Factures', ['listeFactures' => $Factures]);
    }
    public function tva($tva){
    	$Factures = Factures::where('tva', $tva)->get();
    	return view('Factures', ['listeFactures' => $Factures]);
    }
    public function ttc($montant_ttc){
    	$Factures = Factures::where('montant_ttc', $montant_ttc)->get();
    	return view('Factures', ['listeFactures' => $Factures]);
    }
    public function total(){
        $Factures = Factures::all();
        return view('Factures', ['listeFactures' => $Factures]);
    }
}
