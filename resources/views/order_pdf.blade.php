<style>
	div{
		display: flex;
		justify-content: center;
	}
</style>

<div> 
        <img src="images/logo-AUTaza.png">
</div>

<div>
<br>
<p>Le numéro du dossier : <strong>{{$Facture->num_dossier}}</strong></p></div>
<div>
<p>Le nom du client : <strong>{{$Facture->nom_client}}</strong></p></div>
<p>Adresse : <strong>{{$Facture->adresse}}</strong></p>
<div>
<p>Commune : <strong>{{$Facture->commune}}</strong></p></div>
<div>
<p>La nature du projet : <strong>{{$Facture->nature_projet}}</strong></p></div>
<div>
<p>La surface : <strong>{{$Facture->surface}}</strong></p></div>
<div>
<p>Montant Total : <strong>{{$Facture->montant_ttc}}</strong></p>
</div>
