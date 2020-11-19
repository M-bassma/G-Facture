<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    //

    protected $fillable = [
        'num_dossier', 'nom_client', 'adresse', 'commune', 'surface', 'nature_projet',
        'montant_ht' , 'tva' , 'montant_ttc' ,'date'
    ];
}
