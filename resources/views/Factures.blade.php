<!DOCTYPE html>
<html>
<head>
  <title>Nouvelle Facture</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <style type="text/css">
    body{
            background-color: #eaeaea;
        }
  	#A{
    display: flex;
    justify-content: space-between;
  }
  #p{
    color: #220e69;
    font-size: 20px;
  }
  #lo{
    color: #ed9000;
    text-decoration: none;
  }
  </style>
</head>
<body>
  @if(isset(Auth::user()->email))
  <header>
    <div id="A">
      <div> 
        <img src="{{ asset('images/logo-AUTaza.png') }}">
      </div>
      <div>
        <br />
        <strong id="p">{{ Auth::user()->name }}</strong>
        <br />
        <a href="{{ url('/login/logout') }}" id="lo"><strong> Se deconnecter</strong></a>
      </div>
    </div>
  </header>
  <section>
  	<br>
  	<div class="container">
  	<table class="table table-striped">
	<thead>
		<tr>
			<th> Le numéro de dossier</th><th>Le nom de client</th><th>L'adresse</th><th>La commune</th><th>La nature du projet</th><th>La surface</th><th>Le montant hors taxe</th><th>Le montant TTC</th><th>La date</th>
		</tr>
	</thead>
	<tbody>
	@foreach($listeFactures as $facture)
	 <tr>
            <td>{!! $facture->num_dossier !!}</td>
            <td>{!! $facture->nom_client !!}</td>
            <td>{!! $facture->adresse !!}</td>
            <td>{!! $facture->commune !!}</td>
            <td>{!! $facture->nature_projet !!}</td>
            <td>{!! $facture->surface !!}</td>
            <td>{!! $facture->montant_ht !!}</td>
            <td>{!! $facture->montant_ttc !!}</td>
            <td>{!! $facture->date !!}</td>
     </tr>
      @endforeach
	 </tbody>
	</table>
</section>
</div>

@else
<script>window.location = "/login";</script>
@endif

  <br />
</div>
</body>
</html>