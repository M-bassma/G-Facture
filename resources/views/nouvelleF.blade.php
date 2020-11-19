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
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
    display: flex;
    flex-direction: column;
  }
  #A{
    display: flex;
    justify-content: space-between;
  }
  a{
    text-decoration: none;
    color: black;
    padding: 10px;
  }

  a:hover{
    text-decoration: none;
  }
  #p{
    color: #220e69;
    font-size: 20px;
  }
  #lo{
    color: #ed9000;
    text-decoration: none;
  }
  .sec{
    display: flex;
    justify-content: space-between;
  }
  #s{
    padding-left: 10px ;
    padding-right: 10px;
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


  <section >
    <br/>
    <div class="container box">
      <br/>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#surface_C').hide();
          $('#surface_P').hide();
          $('#surf').hide();
          $('#nombre_et').hide();
          $('#enregistrer').hide();

          $('select[name="nature_projet"]').change(function() {
            var valeur = $(this).val();
  
          if(valeur != '') { // si non vide
              if(valeur == 'Construction') { // si "jaune"
                $('#surface_C').show();
                $('#surf').show();
                $('#nombre_et').show();
                $('#surface_P').hide(); 
           } else {
               $('#surface_C').hide();
               $('#nombre_et').hide();
               $('#surface_P').show();
               $('#surf').show();     
          }
         } else{
              $('#surface_C').hide();
              $('#surface_P').hide();
              $('#nombre_et').hide();
              $('#surf').hide();
         }

});
          $('input[name="montant_ht"]').change(function(){
            var a=$(this).val();
            $('input[name="tva"]').val(0.2*a);
            $('input[name="montant_ttc"]').val('');
            $('select[name="paiement"]').val('');
          $('#enregistrer').hide();
          });
          $('select[name="paiement"]').change(function(){
            var v = $(this).val();
          if(v =='espece'){
            var c=$('input[name="montant_ht"]').val();
            $('input[name="montant_ttc"]').val(1.225*c);
            $('#enregistrer').show();
          }
          else{
            if (v == 'autres') {
            var c=$('input[name="montant_ht"]').val();
            $('input[name="montant_ttc"]').val(1.2*c);
            $('#enregistrer').show();
            }
          }
              
          });
        });
</script>
      <form method="post"  id="s" action="{{ url('/login/ajoutF') }}">
       {{ csrf_field() }}
       @if(@session('response'))
       <div class="col-md-8 alert alert-success">
         {{@session('success')}}
       </div>
       @endif
        <div class="sec">
          <div class="form-group">
            <label>Numéro de dossier :</label>
            <input type="text" name="num_dossier" class="form-control">
          </div>
          <div class="form-group">
            <label>Nom du client :</label>
            <input type="text" name="nom_client" class="form-control">
          </div>
        </div>
        <div class="sec">
          <div class="form-group">
            <label>Adresse :</label>
            <input type="text" name="adresse" class="form-control">
          </div>
          <div class="form-group">
            <label>Commune :</label>
            <input type="text" name="commune" class="form-control">
          </div>
        </div>
        <div class="sec">
          <div class="form-group">
            <label>Nature du projet :</label>
            <select class="form-control" name="nature_projet">
              <option></option>
              <option value="Construction">Construction</option>
              <option value="Autres">Autres</option>
            </select>
          </div>
            <div class="form-group" id="surf" >
              <label id="surface_C">Surface Cessible :</label>
              <label id="surface_P">Surface plancher couvert :</label>
              <input type="text" class="form-control" name="surface">
            </div>

            <div class="form-group" id="nombre_et">
              <label>Nombre des étages :</label>
              <input type="text"  class="form-control" name="etage">
            </div>
          </div>
          <div class="sec">
           <div class="form-group">
            <label>Montant HT :</label>
            <input type="text" name="montant_ht" class="form-control">
          </div>
        <div class="form-group">
          <label>Type de paiement :</label>
          <select class="form-control" name="paiement">
              <option></option>
              <option value="espece">En espece</option>
              <option value="autres">Autres</option>
            </select>
        </div>
        </div>
        <div class="sec">
          <div class="form-group">
            <label>TVA 20% :</label>
            <input type="text" name="tva" class="form-control">
          </div>
         <div class="form-group">
          <label>Montant TTC :</label>
          <input type="text" name="montant_ttc" class="form-control">
        </div>
      </div>
      <div class="sec">
        <div class="form-group">
          <input type="submit" name="enregistrer" id="enregistrer" class="btn btn-primary" value="Enregistrer" />
        </div>
      </div>
    </form>

  </div>
</section>

@else
<script>window.location = "/login";</script>
@endif

  <br />
</div>
</body>
</html>