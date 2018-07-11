@extends('template.main')
@section('title','Configuraciones de Vhiculo ' . $vehiculo->patente)

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/configuracion.mantencion.js') }}"></script>
@endsection
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('css/select2-materialize.css') }}" rel="stylesheet">
<link href="{{ asset('css/configuracion.mantencion.css') }}" rel="stylesheet" />
@endsection
@section('botonera')
<div class="nav-content">
  <a class="btn-floating btn-large halfway-fab waves-effect waves-light red accion" href="#!" title="Guardar" style="position:fixed; top:5%;">
    <i class="material-icons fixed">save</i>
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
              <form id="form-mantencion" method="{{$mantencionProgramada == null ? 'post' : 'put'}}" action="/vehiculo/{{$vehiculo->id}}/configuracion/mantencion">
                    @csrf
                    @if($mantencionProgramada != null)
                    @method('PUT')
                    @endif

                    <div class="col s12">
                      <h5>Modificar Mantención</h5>
                    <div class="row">
                      <div class="col s6">
                        <label for="first_name">Mantención</label>
                        <!-- Switch -->
                         <div class="switch">
                           <label>
                             Por Fecha
                             <input type="checkbox" name="esKilometraje" class="accionar-tipo" {{$mantencionProgramada != null && $mantencionProgramada->tipoProgramacion =='kilometraje' ? 'checked' : ''}}>
                             <span class="lever"></span>
                             Por Kilometraje
                           </label>
                         </div>
                      </div>
                    </div>

                    <br/>
                    <div class="row">
                      <div class="input-field col s12 m11 select-especial">
                        <select id="idMantencionDisponible" name="idMantencionDisponible" class="validate">
                          <option value="" disabled selected placeholder>Seleccione</option>
                          @foreach($mantecionesDisponibles as $mntd)
                          <option value="{{$mntd->id}}" {{$mantencionProgramada != null &&  $mntd->id == $mantencionProgramada->id ? 'selected' : ''}}>{{$mntd->nombre}}</option>
                          @endforeach
                        </select>
                        <label for="idMantencionDisponible">Mantención</label>
                      </div>
                      <div class="col s12 m1"><a class="btn-floating blue"><i class="material-icons">add</i></a></div>

                      <div class="input-field col s12 m6 por-fecha">
                        <input id="fechaInicial" name="fechaInicial" type="text" class="validate datepicker" value="{{$mantencionProgramada != null ? $mantencionProgramada->fechaInicial : ''}}" readonly>
                        <label for="fechaInicial" class="subire">Fecha Inicial</label>
                      </div>
                      <div class="input-field col s12 m6 por-fecha">
                        <select id="tipoLapso" name="tipoLapso" class="validate" required>
                          <option value="" disabled selected>Seleccione</option>
                          <option value="dias" {{$mantencionProgramada != null && $mantencionProgramada->tipoLapso == 'dias' ? 'selected' : ''}}>Días</option>
                          <option value="semanas" {{$mantencionProgramada != null && $mantencionProgramada->tipoLapso == 'semanas' ? 'selected' : ''}}>Semanas</option>
                          <option value="meses" {{$mantencionProgramada != null && $mantencionProgramada->tipoLapso == 'meses' ? 'selected' : ''}}>Meses</option>
                          <option value="años" {{$mantencionProgramada != null && $mantencionProgramada->tipoLapso == 'años' ? 'selected' : ''}}>Años</option>
                        </select>
                        <label for="fechaInicial">Tipo de Lapso</label>
                      </div>
                      <div class="input-field col s12 m6 por-kilometraje hidden">
                        <input id="kilometrajeInicial" name="kilometrajeInicial" type="number" class="validate" value="{{$mantencionProgramada != null ? $mantencionProgramada->kilometrajeInicial : ''}}" required>
                        <label for="kilometrajeInicial" class="subire">Kilometraje Inicial</label>
                      </div>
                      <div class="input-field col s12 m6">
                        <input id="periodoMantencion" name="periodoMantencion" type="number" class="validate" value="{{$mantencionProgramada != null ? $mantencionProgramada->periodoMantencion : ''}}" required>
                        <label for="periodoMantencion" class="subire">Periodo de Mantención</label>
                      </div>
                    </div>
                    </div>
              </form>

          </div>
        </div>
    </div>
<input type="hidden" id="__idVehiculo" value="{{$vehiculo->id}}" />


@endsection
