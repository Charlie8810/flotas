@extends('template.main')
@section('title','Crear Nuevo Slider')

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection


@section('contenido')
  <div class="section no-pad-bot">

    <div class="container">
      <nav>
        <div class="nav-wrapper ">
          <div class="col s12">
            <a href="#!" class="breadcrumb">First</a>
            <a href="#!" class="breadcrumb">Second</a>
            <a href="#!" class="breadcrumb">Third</a>
          </div>
        </div>
      </nav>
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m12">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">Hola mundo mundial settings</i></h2>
            <h5 class="center">Easy to work with, es muy facil de trabajar por la cresta!!!</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>


@endsection
