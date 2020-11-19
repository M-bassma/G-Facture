<!DOCTYPE html>
<html>
 <head>
  <title>welcome</title>
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
   }
   #A{
    display: flex;
    justify-content: space-between;
   }
   #sa{
    display: flex;
    justify-content: center;
   }
   .facture{
    margin: 80px;
    text-align: center;
   }
   a{
    text-decoration: none;
    color: black;
    padding: 10px;
   }

   a:hover{
    text-decoration: none;
  }
   .ab:hover{
    color: #220e69;
    font-size: 1em;
    margin: 10px;
    padding: 10px;
   }
   button{
    margin-top: 10px;
   }
   button:hover{
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
  <br/>
  <section id="sa">
    <section>
      <div class="facture">
        <img src="{{ asset('images/fact-2.png') }}"><br/>
        <button class="btn btn-primary"><strong><a href="{{url('/login/nouvelleF')}}" class="ab">Ajouter Facture</a></strong></button>
      </div>
    </section>

    <section>
      <div class="facture">
        <img src="{{ asset('images/fact-1.png') }}"><br/>
        <button class="btn btn-primary"><strong><a href="{{url('/login/suiviF')}}" class="ab" >Suivre Facture</a></strong></button>
      </div>
    </section>
  </section>

    @else
        <script>window.location = "/login";</script>
    @endif

   <br />
  </div>
 </body>
</html>