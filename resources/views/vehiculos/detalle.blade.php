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
<link href="{{ asset('css/vehiculo.detalle.css') }}" rel="stylesheet">
@endsection

@section('botonera')
<div class="nav-content">
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" id="btn-store" title="Guardar Vehículo" style="position:fixed; top:5%;">
    <i class="material-icons fixed">save</i>
  </a>
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light yellow" href="/vehiculo" title="Volver a Listado" style="position:fixed; top:5%; right:85px;">
    <i class="material-icons fixed">arrow_back</i>
  </a>
</div>
@endsection


@section('contenido')
  <div class="section no-pad-bot">


  <div class="row">
    <div class="col s12">

        <div class="row">
            <br />
            <form class="col s12" id="formVehiculo" name="formVehiculo" action="/vehiculo" method="post">
              @csrf
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
                        <div class="input-field col s12 m4">
                          <label for="patente" data-error="wrong" data-success="right">Patente</label>
                          <input id="patente" name="patente" type="text" class="validate error" value="{{($data != null) ? $data->patente : ''}}"  minlength="7" maxlength="7" required/>

                        </div>

                        <div class="input-field col s12 m4">
                          <input id="numeroMotor" name="numeroMotor" type="text" class="validate" value="{{($data != null) ? $data->numeroMotor : ''}}" minlength="7" required />
                          <label for="numeroMotor">Número Motor</label>
                        </div>

                        <div class="input-field col s12 m4">
                          <input id="numeroChasis" name="numeroChasis" type="text" class="validate" value="{{($data != null) ? $data->numeroChasis : ''}}" minlength="7" required />
                          <label for="numeroChasis">Número Chasis</label>
                        </div>

                        <div class="input-field col s12 m4">
                          <input id="marca" name="marca" type="text" class="validate" value="{{($data != null) ? $data->marca : ''}}" minlength="1" required />
                          <label for="marca">Marca</label>
                        </div>
                        <div class="input-field col s12 m4">
                          <input id="modelo" name="modelo" type="text" class="validate" value="{{($data != null) ? $data->modelo : ''}}" minlength="1" required />
                          <label for="modelo">Modelo</label>
                        </div>

                        <div class="input-field col s12 m4">
                          <input id="anio" name="anio" type="text" class="validate" value="{{($data != null) ? $data->anio : ''}}" minlength="4" maxlength="4" required />
                          <label for="anio">Año</label>
                        </div>

                        <div class="input-field col s12 m4">
                          <input id="kilometrajeInicial" name="kilometrajeInicial" type="text" class="validate" value="{{($data != null) ? $data->kilometrajeInicial : ''}}" minlength="1" required />
                          <label for="kilometrajeInicial">Kilometraje Inicial</label>
                        </div>

                        <div class="input-field col s12 m4">
                          <input id="capacidadEstanque" name="capacidadEstanque" type="text" class="validate" value="{{($data != null) ? $data->capacidadEstanque : ''}}" minlength="2" required />
                          <label for="capacidadEstanque">Capacidad Estanque (Litros)</label>
                        </div>

                        <div class="input-field col s12 m4">
                          <input id="color" name="color" type="text" class="validate" value="{{($data != null) ? $data->color : ''}}" minlength="1" required />
                          <label for="color">Color</label>
                        </div>

                        <div class="input-field col s12 m4">
                          <input id="tipoVehiculo" name="tipoVehiculo" type="text" class="validate" value="{{($data != null) ? $data->tipoVehiculo : ''}}" minlength="1" required />
                          <label for="color">Tipo Vehículo</label>
                        </div>

                        <div class="input-field col s12 m4">
                          <input id="dueno" name="dueno" type="text" class="validate" value="{{($data != null) ? $data->dueno : ''}}" minlength="1" required />
                          <label for="dueno">Dueño</label>
                        </div>
                        <div class="input-field col s12">
                          <textarea id="observaciones" name="observaciones" class="materialize-textarea">{{($data != null) ? $data->observaciones : ''}}</textarea>
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

@endsection
