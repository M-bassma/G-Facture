<!DOCTYPE html>
<html>
<head>
  <title>suivre Facture</title>
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
      <form method="post"  id="s" action="{{ url('/login/condition') }}">
        {{ csrf_field() }}
        <div class="sec">
          <label>Date :</label>
          <div class="form-group">
            <label>Debut</label>
            <input type="text" name="debut" class="form-control"  placeholder="aaaa-mm-jj" value="Toutes">
          </div>
          <div class="form-group">
            <label>fin</label>
            <input type="text" name="fin" class="form-control"  placeholder="aaaa-mm-jj" value="Toutes">
          </div>
        </div>
        <div class="sec">
          <div class="form-group">
            <label>Numéro de dossier :</label>
            <input type="text" name="num_dossier" class="form-control" value="Toutes">
          </div>
          <div class="form-group">
            <label>Nom du client :</label>
            <input type="text" name="nom_client" class="form-control" value="Toutes">
          </div>
        </div>
        <div class="sec">
          <div class="form-group">
            <label>Adresse :</label>
            <input type="text" name="adresse" class="form-control" value="Toutes">
          </div>
          <div class="form-group">
            <label>Commune :</label>
            <input type="text" name="commune" class="form-control" value="Toutes">
          </div>
        </div>
        <div class="sec">
           <div class="form-group">
            <label>Montant HT :</label>
            <input type="text" name="montant_ht" class="form-control" value="Toutes">
          </div>
          <div class="form-group">
            <label>TVA 20% :</label>
            <input type="text" name="tva" class="form-control" value="Toutes">
          </div>
        </div>
        <div class="sec">
         <div class="form-group">
          <label>Montant TTC :</label>
          <input type="text" name="montant_ttc" class="form-control" value="Toutes">
        </div>
        <div class="form-group">
          <br>
          <input type="submit" name="chercher" id="chercher" class="btn btn-primary" value="Chercher" />
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