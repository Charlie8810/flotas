<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('metas')

    <title>@yield('title','Inicio') |  Administracion Buses Villar </title>

    <!--Css Principal-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Estilos de las vistas-->
    @yield('styles')

</head>

<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Gestión de Flotas</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  @yield('contenido')
  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Buses Villar Ltda.</h5>
          <p class="grey-text text-lighten-4">Somos una empresa dedicada al transporte privado.</p>
          <p class="grey-text text-lighten-4">Bienaventurados los que controlan la gestión de su empresa con la ayuda de la tecnología.</p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Configuración</h5>
          <ul>
            <li><a class="white-text" href="#!">Mis datos</a></li>
            <li><a class="white-text" href="#!">Mantenedores</a></li>
            <li><a class="white-text" href="#!">Accesos</a></li>
            <li><a class="white-text" href="#!">Logs</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Links de Interés</h5>
          <ul>
            <li><a class="white-text" href="http://www.busesvillar.cl">www.busesvillar.cl</a></li>
            <li><a class="white-text" href="#!wiki">Guía</a></li>
            <li><a class="white-text" href="mailto:calrpradenas@gmail.com">Soporte</a></li>
            <li><a class="white-text" href="#!">Ideas?</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Hecho por <a href="#!" class="teal-text text-lighten-3">José Alejandro</a> y <a class="teal-text text-lighten-3" href="https://www.instagram.com/cpradenas/">@Charly</a>
      </div>
    </div>
  </footer>

   <!--Js Principal-->
   <script src="{{ asset('js/app.js') }}"></script>
   <!--Scripts de las vistas-->
   @yield('scripts')
 </body>
</html>
