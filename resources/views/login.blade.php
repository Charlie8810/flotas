<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Login |  Administración Buses Villar </title>

    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Css Principal-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
    <div class="row">
        <form class="col s12" method="POST" id="form-acceso">
          <div class="row">
              <h4>Acceso</h4>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="usuario" type="text" class="validate">
              <label for="usuario">Usuario</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="llave" type="password" class="validate">
              <label for="llave">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6">
              <button type="submit" class="btn">Acceso</button>
            </div>
          </div>
        </form>
      </div>

   <!--Js Principal-->
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/formatter.min.js') }}"></script>
   <script src="{{ asset('js/login.js') }}"></script>
    </div>
 </body>
</html>
