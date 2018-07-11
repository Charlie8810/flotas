@extends('template.main')
@section('title','Configuraciones de Vhiculo ' . $vehiculo->patente)

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/configuracion.index.js') }}"></script>
@endsection
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('css/select2-materialize.css') }}" rel="stylesheet">
<link href="{{ asset('css/configuracion.index.css') }}" rel="stylesheet" />
@endsection
@section('botonera')
<div class="nav-content">
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light red accion" href="/vehiculo/{{$vehiculo->id}}/configuracion/mantencion" title="Nuevo" style="position:fixed; top:5%;">
    <i class="material-icons fixed">add</i>
  </a>
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light yellow" href="/vehiculo/{{$vehiculo->id}}/configuracion" title="Volver a Listado" style="position:fixed; top:5%; right:85px;">
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
                <div class="col s12">
                  <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3 active"><a href="#pe_mantenciones">Mantenciones</a></li>
                        <li class="tab col s3 active"><a href="#pe_neumaticos">Neumaticos</a></li>
                    </ul>
                  </div>

                  <div id="pe_mantenciones" class="col s12">
                    <div class="card">
                          <table id="table-mantenciones" class="row-border" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>Acciones</th>
                                <th>Nombre Servicio</th>
                                <th>Tipo Programacion</th>
                                <th>Fecha / Km Inicial</th>
                                <th>Periodo Mantención</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($vehiculo->mantenciones as $mantencion)
                              <tr>
                                  <td>{{$mantencion->id}}</td>
                                  <td>{{$mantencion->mntdisponible->nombre}}</td>
                                  <td>{{$mantencion->tipoProgramacion}}</td>
                                  <td>{{($mantencion->tipoProgramacion == 'fecha') ? $mantencion->fechaInicial->format('d/m/Y') : $mantencion->kilometrajeInicial}}</td>
                                  <td>Cada {{$mantencion->periodoMantencion}} {{($mantencion->tipoProgramacion == 'fecha') ?  $mantencion->tipoLapso : 'kms'  }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                  </div>

                  <div id="pe_neumaticos" class="col s12">
                    <ul class="collapsible expandable">
                      <li class="active">
                        <div class="collapsible-body">
                          <table id="table-neumaticos" class="row-border" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>Acciones</th>
                                <th>Nombre Servicio</th>
                                <th>Tipo Programacion</th>
                                <th>Fecha / Km Inicial</th>
                                <th>Periodo Mantencion</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
          </div>


            </div>
          </div>
      </div>
<input type="hidden" id="__idVehiculo" value="{{$vehiculo->id}}" />
@component('configuracion.modal')
  @slot('unique')
  modal-mantenciones
  @endslot

  @slot('footer')
   <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
   <a href="#!" class="waves-effect waves-green btn-flat" id="btn-guardar-mantencionp">Guardar</a>
  @endslot

  <h5>Modificar Mantención</h5>
  <div class="row">
    <form class="col s12" id="form-mantencion" method="post" action="/vehiculo/{{$vehiculo->id}}/configuracion/mantencion">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col s6">
          <label for="first_name">Mantención</label>
          <!-- Switch -->
           <div class="switch">
             <label>
               Por Fecha
               <input type="checkbox" name="esKilometraje" class="accionar-tipo">
               <span class="lever"></span>
               Por Kilometraje
             </label>
           </div>
        </div>
      </div>

      <div class="row">

        <div class="input-field col s12 select-especial">
          <select id="idMantencionDisponible" name="idMantencionDisponible" class="validate">
            <option value="" disabled selected placeholder>Seleccione</option>
            @foreach($mntDisponibles as $mntd)
            <option value="{{$mntd->id}}">{{$mntd->nombre}}</option>
            @endforeach
          </select>
          <label for="idMantencionDisponible">Mantención</label>
        </div>

        <div class="input-field col s12 m6 por-fecha">
          <input id="fechaInicial" name="fechaInicial" type="text" class="validate datepicker" readonly>
          <label for="fechaInicial" class="subire">Fecha Inicial</label>
        </div>
        <div class="input-field col s12 m6 por-fecha">
          <select id="tipoLapso" name="tipoLapso" class="validate" required>
            <option value="" disabled selected>Seleccione</option>
            <option value="dias">Días</option>
            <option value="semanas">Semanas</option>
            <option value="meses">Meses</option>
            <option value="años">Años</option>
          </select>
          <label for="fechaInicial">Tipo de Lapso</label>
        </div>
        <div class="input-field col s12 m6 por-kilometraje hidden">
          <input id="kilometrajeInicial" name="kilometrajeInicial" type="number" class="validate" required>
          <label for="kilometrajeInicial" class="subire">Kilometraje Inicial</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="periodoMantencion" name="periodoMantencion" type="number" class="validate" required>
          <label for="periodoMantencion" class="subire">Periodo de Mantención</label>
        </div>
      </div>

    </form>
  </div>

@endcomponent

@endsection
