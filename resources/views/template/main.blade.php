<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('metas')

    <title>@yield('title','Inicio') |  Administracion Buses Villar </title>

    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Css Principal-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Estilos de las vistas-->
    @yield('styles')

</head>

<body>
  <header>

      <div class="navbar-fixed">
        <nav class="light-blue lighten-1" role="navigation">
          <div class="nav-wrapper container fixed">
            <a id="logo-container" href="#" class="brand-logo">@yield('title','Inicio')</a>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          </div>
      </nav>
    </div>

    <ul id="slide-out" class="sidenav sidenav-fixed">
      <li>
        <a href="#!" class="logo-container">Gestión Flotas<i class="material-icons left medium">directions</i></a>
      </li>
      <li class="bold"><a href="#!"><i class="small material-icons">directions_bus</i> Vehiculos</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Mantenedores</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!">Coferes</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>

    </ul>



  </header>
  <main>
    @yield('contenido')
  </main>
  <footer class="page-footer grey">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <a href="#!">
              <img src="/img/logo.png"  />
          </a>
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
