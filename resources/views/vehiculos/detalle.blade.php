@extends('template.main')
@if($data == null)
  @section('title','Nuevo Vehículo')
@else
  @section('title','Detalle Vehículo')
@endif
@section('scripts')
<script src="{{ asset('js/vehiculo.detalle.js') }}"></script>
@endsection
@section('styles')
<link href="css/vehiculo.detalle.css" rel="stylesheet">
@endsection

@section('contenido')
  <div class="section no-pad-bot">


  <div class="row">
    <div class="col s12">

      <div class="card">

        <div class="row">
            <form class="col s12">
              <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3 active"><a href="#pe_general">General</a></li>
                  @foreach ($vm['pestanasVM'] as $pestana)
                    <li class="tab col s3"><a href="#pe_{{$pestana->slug}}">{{$pestana->nombre}}</a></li>
                  @endforeach
                </ul>
              </div>

              <div id="pe_general" class="col s12">
                <ul class="collapsible">
                  <li class="active">
                    <div class="collapsible-body">
                      <div class="row">
                        <div class="input-field col s4">
                          <input id="patente" name="patente" type="text" class="validate">
                          <label for="patente">Patente</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="numeroMotor" name="numeroMotor" type="text" class="validate">
                          <label for="numeroMotor">Número Motor</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="numeroChasis" name="numeroChasis" type="text" class="validate">
                          <label for="numeroChasis">Número Chasis</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="marca" name="marca" type="text" class="validate">
                          <label for="marca">Marca</label>
                        </div>
                        <div class="input-field col s4">
                          <input id="modelo" name="modelo" type="text" class="validate">
                          <label for="modelo">Modelo</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="anio" name="anio" type="text" class="validate">
                          <label for="anio">Año</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="kilometrajeInicial" name="kilometrajeInicial" type="text" class="validate">
                          <label for="kilometrajeInicial">Kilometraje Inicial</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="capacidadEstanque" name="capacidadEstanque" type="text" class="validate">
                          <label for="capacidadEstanque">Capacidad Estanque</label>
                        </div>

                        <div class="input-field col s4">
                          <input id="color" name="color" type="text" class="validate">
                          <label for="color">Color</label>
                        </div>

                        <div class="input-field col s12">
                          <textarea id="observaciones" name="observaciones" class="materialize-textarea"></textarea>
                          <label for="observaciones">Observaciones</label>
                        </div>

                      </div>


                    </div>
                  </li>
                </ul>
              </div>
              @foreach ($vm['pestanasVM'] as $pestana)
                <div id="pe_{{$pestana->slug}}" class="col s12">
                  <ul class="collapsible">
                      @foreach($pestana->titulos as $titulo)
                        @if(strlen($titulo->nombre) > 0)
                            <li class="active">
                              <div class="collapsible-header"><i class="material-icons">chevron_right</i>{{$titulo->nombre}}</div>
                              <div class="collapsible-body">
                                <div class="row">
                                  @foreach($titulo->atributos as $attr)
                                      @component('vehiculos.atribehiculo', ['attr' => $attr])
                                      @endcomponent
                                  @endforeach
                                </div>
                              </div>
                            </li>
                        @else
                            <li class="active">
                              <div class="collapsible-body">
                                <div class="row">
                                  @foreach($titulo->atributos as $attr)
                                      @component('vehiculos.atribehiculo', ['attr' => $attr])
                                      @endcomponent
                                  @endforeach
                                </div>
                              </div>
                            </li>
                        @endif
                      @endforeach
                  </ul>
                </div>

              @endforeach
            </form>
      </div>


          </div>

        </div>
      </div>

  </div>

@endsection
